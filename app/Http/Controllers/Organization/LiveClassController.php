<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\GmeetSetting;
use App\Models\LiveClass;
use App\Models\Order_item;
use App\Tools\Repositories\Crud;
use App\Traits\General;
use App\Traits\SendNotification;
use App\Traits\ZoomMeetingTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use JoisarJignesh\Bigbluebutton\Facades\Bigbluebutton;

class LiveClassController extends Controller
{
    use General, ZoomMeetingTrait, SendNotification;

    const MEETING_TYPE_INSTANT = 1;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;
    protected $model, $courseModel;

    public function __construct(LiveClass $liveClass, Course $course)
    {
        $this->model = new CRUD($liveClass);
        $this->courseModel = new CRUD($course);
    }

    public function courseLiveClassIndex()
    {
        $data['title'] = 'Live Class';
        $data['navLiveClassActiveClass'] = 'active';

        $now = now();

        $data['courses'] = Course::whereUserId(Auth::user()->id);
        $data['courses'] = $data['courses']->withCount([
            'liveClasses as total_upcoming' => function ($q) use ($now) {
                $q->select(DB::raw("COUNT(id) as total_upcoming"));
                $q->where('date', '>=', $now);
            },
            'liveClasses as total_past' => function ($q) use ($now) {
                $q->select(DB::raw("COUNT(id) as total_past"));
                $q->where('date', '<=', $now);
            },

        ])->paginate();


        return view('organization.live_class.live-class-course-list', $data);
    }

    public function liveClassIndex(Request $request, $course_uuid)
    {
        $data['title'] = 'Live Class List';
        $data['navLiveClassActiveClass'] = 'active';
        if ($request->past) {
            $data['navPastActive'] = 'active';
            $data['tabPastActive'] = 'show active';
        } else {
            $data['navUpcomingActive'] = 'active';
            $data['tabUpcomingActive'] = 'show active';
        }

        $data['course'] = $this->courseModel->getRecordByUuid($course_uuid);

        $now = now();

        $data['upcoming_live_classes'] = LiveClass::whereCourseId($data['course']->id)->whereUserId(Auth::user()->id)
            ->where('date', '>=', $now)
            ->latest()->paginate(15, '*', 'upcoming');

        $data['past_live_classes'] = LiveClass::whereCourseId($data['course']->id)->whereUserId(Auth::user()->id)
            ->where('date', '<=', $now)
            ->latest()->paginate(15, '*', 'past');



        return view('organization.live_class.live-class-list', $data);
    }

    public function createLiveCLass($course_uuid)
    {
        $data['title'] = 'Live Class Create';
        $data['navLiveClassActiveClass'] = 'active';
        $data['course'] = $this->courseModel->getRecordByUuid($course_uuid);
        $data['gmeet'] = GmeetSetting::whereUserId(Auth::id())->where('status', GMEET_AUTHORIZE)->first();
        return view('organization.live_class.create', $data);
    }

    public function store(Request $request, $course_uuid)
    {
        $request->validate([
            'class_topic' => 'required|max:255',
            'date' => 'required',
            'duration' => 'required',
            'moderator_pw' => 'nullable|min:6',
            'attendee_pw' => 'nullable|min:6',
        ]);

        try {
            DB::beginTransaction();
            $course = $this->courseModel->getRecordByUuid($course_uuid);
            $class = new LiveClass();
            $class->course_id = $course->id;
            $class->class_topic = $request->class_topic;
            $class->date = $request->date;
            $class->duration = $request->duration;
            $class->start_url = $request->start_url;
            $class->join_url = $request->join_url;
            $class->meeting_host_name = $request->meeting_host_name;
            $class->meeting_id = $request->meeting_host_name == 'jitsi' ? $request->jitsi_meeting_id : $class->id . rand();
            $class->moderator_pw = $request->moderator_pw;
            $class->attendee_pw = $request->attendee_pw;
            $class->save();

            /** ====== Start:: BigBlueButton create meeting ===== */
            if ($class->meeting_host_name == 'bbb') {
                Bigbluebutton::create([
                    'meetingID' => $class->meeting_id,
                    'meetingName' => $class->class_topic,
                    'attendeePW' => $request->moderator_pw,
                    'moderatorPW' => $request->attendee_pw
                ]);
            }
            /** ====== End:: BigBlueButton create meeting ===== */

            /** ====== Start:: Gmeet create meeting ===== */
            if ($class->meeting_host_name == 'gmeet') {
                $endDate = \Carbon\Carbon::parse($class->date)->addMinutes($class->duration);
                $link = GmeetSetting::createMeeting($class->class_topic, $class->date, $endDate);
                $class->join_url = $link;
                $class->save();
            }
            /** ====== End:: Gmeet create meeting ===== */


            /** ====== send notification to student ===== */
            $students = Enrollment::where('course_id', $course->id)->select('user_id')->get();
            foreach ($students as $student) {
                $text = __("New Live Class Added");
                $target_url = route('student.my-course.show', $course->slug);
                $this->send($text, 3, $target_url, $student->user_id);
            }
            /** ====== send notification to student ===== */

            DB::commit();
            $this->showToastrMessage('success', 'Live Class Created Successfully');
            return redirect()->route('organization.live-class.index', $course_uuid);
        } catch (Exception $e) {
            DB::rollBack();
            $this->showToastrMessage('error', 'Please check your credentials');
            return redirect()->back()->withInput();
        }
    }

    public function view($course_uuid, $uuid)
    {
        $data['title'] = 'Live Class Details';
        $data['navLiveClassActiveClass'] = 'active';
        $data['course'] = $this->courseModel->getRecordByUuid($course_uuid);
        $data['liveClasses'] = $this->model->getRecordByUuid($uuid);
        return view('organization.live_class.view', $data);
    }

    public function delete($uuid)
    {
        $this->model->deleteByUuid($uuid);
        $this->showToastrMessage('error', __('Deleted Successfully'));
        return redirect()->back();
    }

    public function getZoomMeetingLink(Request $request)
    {
        $response = $this->create($request->all());

        return response()->json([
            'start_url' => $response['data']['start_url'],
            'join_url' => $response['data']['join_url']
        ]);
    }

    public function bigBlueButtonJoinMeeting($liveClassId)
    {
        $liveClass = LiveClass::find($liveClassId);
        if ($liveClass) {
            return redirect()->to(
                Bigbluebutton::join([
                    'meetingID' => $liveClass->meeting_id,
                    'userName' => auth()->user()->instructor()->name ?? auth()->user()->student()->name ?? auth()->user()->name,
                    'password' => $liveClass->attendee_pw //which user role want to join set password here
                ])
            );
        } else {
            $this->showToastrMessage('error', __('Live Class is not found'));
            return redirect()->back();
        }
    }

    public function jitsiJoinMeeting($liveClassUUId)
    {
        $data['title'] = 'Jitsi Meet';
        $data['liveClass'] = LiveClass::where('uuid', $liveClassUUId)->firstOrFail();
        return view('organization.live_class.jitsi-live-class')->with($data);
    }
}
