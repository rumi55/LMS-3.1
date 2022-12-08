<?php

use App\Http\Controllers\Organization\AccountController;
use App\Http\Controllers\Organization\AssignmentController;
use App\Http\Controllers\Organization\BundleCourseController;
use App\Http\Controllers\Organization\CertificateController;
use App\Http\Controllers\Organization\CourseController;
use App\Http\Controllers\Organization\ExamController;
use App\Http\Controllers\Organization\LessonController;
use App\Http\Controllers\Organization\ResourceController;
use App\Http\Controllers\Organization\ScormController;
use App\Http\Controllers\Organization\ConsultationController;
use App\Http\Controllers\Organization\DashboardController;
use App\Http\Controllers\Organization\DiscussionController;
use App\Http\Controllers\Organization\FinanceController;
use App\Http\Controllers\Organization\FollowController;
use App\Http\Controllers\Organization\GmeetSettingController;
use App\Http\Controllers\Organization\InstructorController;
use App\Http\Controllers\Organization\LiveClassController;
use App\Http\Controllers\Organization\NoticeBoardController;
use App\Http\Controllers\Organization\ProfileController;
use App\Http\Controllers\Organization\StudentController;
use App\Http\Controllers\Organization\ZoomSettingController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::prefix('instructor')->group(function () {
    Route::get('/', [InstructorController::class, 'index'])->name('instructor.index');
    Route::get('create', [InstructorController::class, 'create'])->name('instructor.create');
    Route::post('store', [InstructorController::class, 'store'])->name('instructor.store')->middleware('isDemo');
    Route::get('edit/{uuid}', [InstructorController::class, 'edit'])->name('instructor.edit');
    Route::post('update/{uuid}', [InstructorController::class, 'update'])->name('instructor.update');
    Route::delete('delete/{uuid}', [InstructorController::class, 'delete'])->name('instructor.delete')->middleware('isDemo');
    Route::post('status', [InstructorController::class, 'status'])->name('instructor.status')->middleware('isDemo');
});

Route::prefix('student')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('student.index');
    Route::get('create', [StudentController::class, 'create'])->name('student.create');
    Route::post('store', [StudentController::class, 'store'])->name('student.store')->middleware('isDemo');
    Route::get('edit/{uuid}', [StudentController::class, 'edit'])->name('student.edit');
    Route::post('update/{uuid}', [StudentController::class, 'update'])->name('student.update')->middleware('isDemo');
    Route::delete('delete/{uuid}', [StudentController::class, 'delete'])->name('student.delete')->middleware('isDemo');
    Route::get('view/{uuid}', [StudentController::class, 'view'])->name('student.view');
    Route::post('status', [StudentController::class, 'status'])->name('student.status')->middleware('isDemo');
});

Route::prefix('course')->group(function () {

    Route::get('create', [CourseController::class, 'create'])->name('course.create');
    Route::get('/', [CourseController::class, 'index'])->name('course.index');
    Route::post('store', [CourseController::class, 'store'])->name('course.store')->middleware('isDemo');
    Route::get('edit/{uuid}', [CourseController::class, 'edit'])->name('course.edit');
    Route::post('update-overview/{uuid}', [CourseController::class, 'updateOverview'])->name('course.update.overview')->middleware('isDemo');
    Route::post('update-category/{uuid}', [CourseController::class, 'updateCategory'])->name('course.update.category')->middleware('isDemo');
    Route::get('upload-finished/{uuid}', [CourseController::class, 'uploadFinished'])->name('course.upload-finished');
    Route::delete('course-delete/{uuid}', [CourseController::class, 'delete'])->name('course.delete')->middleware('isDemo');

    Route::prefix('lesson')->group(function () {
        Route::post('store/{course_uuid}', [LessonController::class, 'store'])->name('lesson.store')->middleware('isDemo');
        Route::post('update-lesson/{course_uuid}/{lesson_id}', [LessonController::class, 'updateLesson'])->name('lesson.update')->middleware('isDemo');
        Route::delete('delete-lesson/{lesson_id}', [LessonController::class, 'deleteLesson'])->name('lesson.delete')->middleware('isDemo');

        Route::get('upload-lecture/{course_uuid}/{lesson_uuid}', [LessonController::class, 'uploadLecture'])->name('upload.lecture');
        Route::post('store-lecture/{course_uuid}/{lesson_uuid}', [LessonController::class, 'storeLecture'])->name('store.lecture')->middleware('isDemo');
        Route::get('edit-lecture/{course_uuid}/{lesson_uuid}/{lecture_uuid}', [LessonController::class, 'editLecture'])->name('edit.lecture');
        Route::post('update-lecture/{lecture_uuid}', [LessonController::class, 'updateLecture'])->name('update.lecture')->middleware('isDemo');
        Route::get('delete-lecture/{course_uuid}/{lecture_uuid}', [LessonController::class, 'deleteLecture'])->name('delete.lecture')->middleware('isDemo');
    });

    Route::post('store-instructor/{course_uuid}', [CourseController::class, 'storeInstructor'])->name('course.store.instructor')->middleware('isDemo');
    Route::prefix('scorm')->group(function () {
        Route::post('{course_uuid}', [ScormController::class, 'store'])->name('scorm.store')->middleware('isDemo');
    });


    Route::prefix('exam')->group(function () {
        Route::get('/{course_uuid}', [ExamController::class, 'index'])->name('exam.index');
        Route::get('create/{course_uuid}', [ExamController::class, 'create'])->name('exam.create');
        Route::post('store/{course_uuid}', [ExamController::class, 'store'])->name('exam.store')->middleware('isDemo');
        Route::get('edit/{uuid}', [ExamController::class, 'edit'])->name('exam.edit');
        Route::post('update/{uuid}', [ExamController::class, 'update'])->name('exam.update')->middleware('isDemo');
        Route::get('view/{uuid}', [ExamController::class, 'view'])->name('exam.view');
        Route::get('delete/{uuid}', [ExamController::class, 'delete'])->name('exam.delete')->middleware('isDemo');
        Route::get('status-change/{uuid}/{status}', [ExamController::class, 'statusChange'])->name('exam.status-change')->middleware('isDemo');
        Route::get('edit-mcq/{question_uuid}', [ExamController::class, 'editMcq'])->name('exam.edit-mcq');
        Route::get('question/{uuid}', [ExamController::class, 'question'])->name('exam.question');
        Route::post('save-mcq-question/{uuid}', [ExamController::class, 'saveMcqQuestion'])->name('exam.save-mcq-question')->middleware('isDemo');
        Route::post('bulk-upload-mcq/{uuid}', [ExamController::class, 'bulkUploadMcq'])->name('exam.bulk-upload-mcq')->middleware('isDemo');
        Route::post('update-mcq-question/{question_uuid}', [ExamController::class, 'updateMcqQuestion'])->name('exam.update-mcq-question')->middleware('isDemo');
        Route::post('save-true-false-question/{uuid}', [ExamController::class, 'saveTrueFalseQuestion'])->name('exam.save-true-false-question')->middleware('isDemo');
        Route::post('bulk-upload-true-false/{uuid}', [ExamController::class, 'bulkUploadTrueFalse'])->name('exam.bulk-upload-true-false')->middleware('isDemo');
        Route::get('edit-true-false/{question_uuid}', [ExamController::class, 'editTrueFalse'])->name('exam.edit-true-false');
        Route::post('update-true-false-question/{question_uuid}', [ExamController::class, 'updateTrueFalseQuestion'])->name('exam.update-true-false-question')->middleware('isDemo');
        Route::get('delete-question/{question_uuid}', [ExamController::class, 'deleteQuestion'])->name('exam.delete-question')->middleware('isDemo');
    });

    Route::group(['prefix' => 'assignments', 'as' => 'assignment.'], function () {
        Route::get('index/{course_uuid}', [AssignmentController::class, 'index'])->name('index');
        Route::get('create/{course_uuid}', [AssignmentController::class, 'create'])->name('create');
        Route::post('store/{course_uuid}', [AssignmentController::class, 'store'])->name('store')->middleware('isDemo');
        Route::get('edit/{course_uuid}/{uuid}', [AssignmentController::class, 'edit'])->name('edit');
        Route::post('update/{course_uuid}/{uuid}', [AssignmentController::class, 'update'])->name('update')->middleware('isDemo');
        Route::get('delete/{uuid}', [AssignmentController::class, 'delete'])->name('delete')->middleware('isDemo');

        Route::group(['prefix' => 'assessments', 'as' => 'assessment.'], function () {
            Route::get('index/{course_uuid}/{assignment_uuid}', [AssignmentController::class, 'assessmentIndex'])->name('index');
            Route::post('update/{assignment_submit_uuid}', [AssignmentController::class, 'assessmentSubmitMarkUpdate'])->name('update')->middleware('isDemo');
            Route::get('download', [AssignmentController::class, 'studentAssignmentDownload'])->name('download')->middleware('isDemo');
        });
    });

    Route::group(['prefix' => 'resource', 'as' => 'resource.'], function () {
        Route::get('index/{course_uuid}', [ResourceController::class, 'index'])->name('index');
        Route::get('create/{course_uuid}', [ResourceController::class, 'create'])->name('create');
        Route::post('store/{course_uuid}', [ResourceController::class, 'store'])->name('store')->middleware('isDemo');
        Route::get('delete/{uuid}', [ResourceController::class, 'delete'])->name('delete')->middleware('isDemo');
    });
});

Route::get('ranking-level-list', [DashboardController::class, 'rankingLevelList'])->name('ranking-level');

Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
Route::post('save-profile/{uuid}', [ProfileController::class, 'saveProfile'])->name('save.profile')->middleware('isDemo');
Route::get('address', [ProfileController::class, 'address'])->name('address');
Route::post('address-update/{uuid}', [ProfileController::class, 'address_update'])->name('address.update');
Route::get('get-state-by-country/{country_id}', [ProfileController::class, 'getStateByCountry']);
Route::get('get-city-by-state/{state_id}', [ProfileController::class, 'getCityByState']);

Route::group(['prefix' => 'bundle', 'as' => ''], function () {
    Route::group(['prefix' => 'course', 'as' => 'bundle-course.'], function () {
        Route::get('index', [BundleCourseController::class, 'index'])->name('index');
        Route::get('create-step-one', [BundleCourseController::class, 'createStepOne'])->name('createStepOne');
        Route::post('store', [BundleCourseController::class, 'store'])->name('store')->middleware('isDemo');
        Route::get('create-step-two/{uuid}', [BundleCourseController::class, 'createEditStepTwo'])->name('createStepTwo');
        Route::get('edit-step-one/{uuid}', [BundleCourseController::class, 'editStepOne'])->name('editStepOne');
        Route::post('add-bundle-course', [BundleCourseController::class, 'addBundleCourse'])->name('addBundleCourse')->middleware('isDemo');
        Route::post('remove-bundle-course', [BundleCourseController::class, 'removeBundleCourse'])->name('removeBundleCourse')->middleware('isDemo');
        Route::get('edit', [BundleCourseController::class, 'edit'])->name('edit');
        Route::put('update/{uuid}', [BundleCourseController::class, 'update'])->name('update')->middleware('isDemo');
        Route::delete('delete/{uuid}', [BundleCourseController::class, 'delete'])->name('delete')->middleware('isDemo');
    });
});


Route::prefix('notice-board')->group(function () {
    Route::group(['prefix' => 'notice-board', 'as' => 'notice-board.'], function () {
        Route::get('course-notice-list', [NoticeBoardController::class, 'courseNoticeIndex'])->name('course-notice.index');
        Route::get('notice-board-list/{course_uuid}', [NoticeBoardController::class, 'noticeIndex'])->name('index');
        Route::get('create-notice-board/{course_uuid}', [NoticeBoardController::class, 'create'])->name('create');
        Route::get('view-notice-board/{course_uuid}/{uuid}', [NoticeBoardController::class, 'view'])->name('view');
        Route::post('notice-board-store/{course_uuid}', [NoticeBoardController::class, 'store'])->name('store')->middleware('isDemo');
        Route::get('edit-notice-board/{course_uuid}/{uuid}', [NoticeBoardController::class, 'edit'])->name('edit');
        Route::post('update-notice-board/{course_uuid}/{uuid}', [NoticeBoardController::class, 'update'])->name('update')->middleware('isDemo');
        Route::get('delete-notice-board/{uuid}', [NoticeBoardController::class, 'delete'])->name('delete')->middleware('isDemo');
    });
});

Route::prefix('live-class')->group(function () {
    Route::group(['prefix' => 'live-class', 'as' => 'live-class.'], function () {
        Route::get('course-live-class-list', [LiveClassController::class, 'courseLiveClassIndex'])->name('course-live-class.index');
        Route::get('live-class-list/{course_uuid}', [LiveClassController::class, 'liveClassIndex'])->name('index');
        Route::get('create-live-class/{course_uuid}', [LiveClassController::class, 'createLiveCLass'])->name('create');
        Route::post('live-class-store/{course_uuid}', [LiveClassController::class, 'store'])->name('store')->middleware('isDemo');
        Route::get('view-live-class/{course_uuid}/{uuid}', [LiveClassController::class, 'view'])->name('view');
        Route::get('delete-live-class/{uuid}', [LiveClassController::class, 'delete'])->name('delete')->middleware('isDemo');
        Route::post('get-zoom-link', [LiveClassController::class, 'getZoomMeetingLink'])->name('get-zoom-link');
    });
});

Route::prefix('finances')->group(function () {
    Route::group(['prefix' => 'finances', 'as' => 'finance.'], function () {
        Route::get('analysis', [FinanceController::class, 'analysisIndex'])->name('analysis.index');
        Route::get('withdraw-history', [FinanceController::class, 'withdrawIndex'])->name('withdraw-history.index');
        Route::get('download-receipt/{uuid}', [FinanceController::class, 'downloadReceipt'])->name('download-receipt')->middleware('isDemo');
        Route::post('store-withdraw', [FinanceController::class, 'storeWithdraw'])->name('store-withdraw')->middleware('isDemo');
    });
});

Route::prefix('account')->group(function () {
    Route::group(['prefix' => 'accounts'], function () {
        Route::get('my-card', [AccountController::class, 'myCard'])->name('my-card');
        Route::post('save-my-card', [AccountController::class, 'saveMyCard'])->name('save.my-card')->middleware('isDemo');
        Route::post('save-paypal', [AccountController::class, 'savePaypal'])->name('save.paypal')->middleware('isDemo');
    });
});

Route::group(['prefix' => 'certificates'], function () {
    Route::get('/', [CertificateController::class, 'index'])->name('certificate.index');
    Route::get('add/{course_uuid}', [CertificateController::class, 'add'])->name('certificate.add');
    Route::post('set-for-create/{course_uuid}', [CertificateController::class, 'setForCreate'])->name('certificate.setForCreate');
    Route::get('create/{course_uuid}/{certificate_uuid}', [CertificateController::class, 'create'])->name('certificate.create');
    Route::post('store/{course_uuid}/{certificate_uuid}', [CertificateController::class, 'store'])->name('certificate.store')->middleware('isDemo');
    Route::get('edit/{uuid}', [CertificateController::class, 'edit'])->name('certificate.edit');
    Route::post('update/{uuid}', [CertificateController::class, 'update'])->name('certificate.update')->middleware('isDemo');
    Route::get('view/{uuid}', [CertificateController::class, 'view'])->name('certificate.view');
});

Route::get('followers', [FollowController::class,'followers'])->name('followers');
Route::get('followings', [FollowController::class,'followings'])->name('followings');

Route::get('discussion-index', [DiscussionController::class, 'index'])->name('discussion.index');
Route::get('course-discussion-list', [DiscussionController::class, 'courseDiscussionList'])->name('course-discussion.list');
Route::post('reply-discussion/{discussion_id}', [DiscussionController::class, 'courseDiscussionReply'])->name('discussion.reply')->middleware('isDemo');

// Route::get('all-enroll', [StudentController::class, 'allStudentIndex'])->name('all-student');


//Start:: Consultation
Route::group(['prefix' => 'consultation', 'as' => 'consultation.'], function () {
    Route::get('/', [ConsultationController::class, 'dashboard'])->name('dashboard');
    Route::post('availability-update', [ConsultationController::class, 'availabilityUpdate'])->name('availabilityUpdate')->middleware('isDemo');
    Route::post('slotStore', [ConsultationController::class, 'slotStore'])->name('slotStore')->middleware('isDemo');
    Route::get('slot-view/{day}', [ConsultationController::class, 'slotView'])->name('slotView');
    Route::delete('slot-delete/{id}', [ConsultationController::class, 'slotDelete'])->name('slotDelete')->middleware('isDemo');
    Route::get('day-available-status-change/{day}', [ConsultationController::class, 'dayAvailableStatusChange'])->name('dayAvailableStatusChange');
});
Route::get('booking-request', [ConsultationController::class, 'bookingRequest'])->name('bookingRequest');
Route::post('cancel-reason/{uuid}', [ConsultationController::class, 'cancelReason'])->name('cancelReason')->middleware('isDemo');
Route::get('booking-history', [ConsultationController::class, 'bookingHistory'])->name('bookingHistory');
Route::get('booking-status/{uuid}/{status}', [ConsultationController::class, 'bookingStatus'])->name('bookingStatus');
Route::post('booking-meeting-create/{uuid}', [ConsultationController::class, 'bookingMeetingStore'])->name('bookingMeetingStore')->middleware('isDemo');
//End:: Consultation

Route::get('zoom-setting', [ZoomSettingController::class, 'zoomSetting'])->name('zoom-setting');
Route::post('zoom-setting', [ZoomSettingController::class, 'zoomSettingUpdate'])->name('zoom-setting.update')->middleware('isDemo');

Route::get('gmeet-setting', [GmeetSettingController::class, 'gMeetSetting'])->name('gmeet_setting');
Route::post('gmeet-setting', [GmeetSettingController::class, 'gMeetSettingUpdate'])->name('gmeet_setting.update')->middleware('isDemo');

Route::get('course-instructor-request', [MultiInstructorController::class, 'index'])->name('multi_instructor');
Route::post('course-instructor-request/{id}', [MultiInstructorController::class, 'changeStatus'])->name('multi_change_status')->middleware('isDemo');
