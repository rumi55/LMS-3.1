<?php

use App\Models\AffiliateHistory;
use App\Models\BookingHistory;
use App\Models\Bundle;
use App\Models\CartManagement;
use App\Models\ConsultationSlot;
use App\Models\Course;
use App\Models\Course_lecture;
use App\Models\CourseInstructor;
use App\Models\Currency;
use App\Models\Enrollment;
use App\Models\ForumPostComment;
use App\Models\Instructor;
use App\Models\InstructorConsultationDayStatus;
use App\Models\Language;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\RankingLevel;
use App\Models\Review;
use App\Models\Setting;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserBadge;
use App\Models\Withdraw;
use App\Models\ZoomSetting;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\UserPackage;
use Illuminate\Support\Str;
use Carbon\Carbon;

function staticMeta($id)
{
    $meta = \App\Models\Meta::find($id);
    $metaData = [];
    if ($meta) {
        $metaData['title'] = $meta->meta_title;
        $metaData['meta_description'] = $meta->meta_description;
        $metaData['meta_keyword'] = $meta->meta_keyword;
    }

    return $metaData;
}

function active_if_match($path)
{
    if (auth::user()->is_admin()) {
        return Request::is($path . '*') ? 'mm-active' : '';
    } else {
        return Request::is($path . '*') ? 'active' : '';
    }
}

function active_if_full_match($path)
{
    if (auth::user()->is_admin()) {
        return Request::is($path) ? 'mm-active' : '';
    } else {
        return Request::is($path) ? 'active' : '';
    }
}

function open_if_full_match($path)
{
    return Request::is($path) ? 'has-open' : '';
}


function toastrMessage($message_type, $message)
{
    Toastr::$message_type($message, '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
}

function get_option($option_key, $default= NULL)
{
    $system_settings = config('settings');

    if ($option_key && isset($system_settings[$option_key])) {
        return $system_settings[$option_key];
    } else {
        return $default;
    }
}

function zoom_status()
{
    $zoom = ZoomSetting::whereUserId(Auth::id())->first();
    $status = 0;
    if ($zoom) {
        $status = $zoom->status;
    }

    return $status;
}

function get_default_language()
{
    $language = Language::where('default_language', 'on')->first();
    if ($language) {
        $iso_code = $language->iso_code;
        return $iso_code;
    }

    return 'en';
}

function get_currency_symbol()
{
    $currency = Currency::where('current_currency', 'on')->first();
    if ($currency) {
        $symbol = $currency->symbol;
        return $symbol;
    }

    return '';
}

function get_currency_code()
{
    $currency = Currency::where('current_currency', 'on')->first();
    if ($currency) {
        $currency_code = $currency->currency_code;
        return $currency_code;
    }

    return '';
}

function get_currency_placement()
{
    $currency = Currency::where('current_currency', 'on')->first();
    $placement = 'before';
    if ($currency) {
        $placement = $currency->currency_placement;
        return $placement;
    }

    return $placement;
}

function get_platform_charge($sub_total)
{
    return ($sub_total * get_option('platform_charge')) / 100;
}

function admin_sell_commission($amount)
{
    return ($amount * get_option('sell_commission')) / 100;
}

function admin_commission_by_percentage($amount, $percentage)
{
    return ($amount * $percentage) / 100;
}

function referral_sell_commission($amount)
{
    return ($amount * get_option('referral_commission_percentage')) / 100;
}

function userBalance($userId = null)
{
    if ($userId == null) {
        return int_to_decimal(Auth::user()->balance);
    }
    $user = User::find($userId);
    return int_to_decimal($user->balance);
}

function instructor_available_balance()
{
    //Start::  Cancel Consultation Money Calculation
    $cancelConsultationOrderItemIds = BookingHistory::whereStatus(2)->where('send_back_money_status', 1)->whereHas('order', function ($q) {
        $q->where('payment_status', 'paid');
    })->pluck('order_item_id')->toArray();
    $orderItems = Order_item::whereIn('id', $cancelConsultationOrderItemIds);
    $cancel_consultation_money = $orderItems->sum('admin_commission') + $orderItems->sum('owner_balance');
    //Start::  Cancel Consultation Money Calculation

    $total_balance = Order_item::where('owner_user_id', Auth::id())->whereHas('order', function ($q) {
        $q->where('payment_status', 'paid');
    })->sum('owner_balance');
    $total_withdraw_balance = Withdraw::where('user_id', auth()->user()->id)->whereIn('status', [0, 1])->sum('amount');
    $available_balance = $total_balance - $total_withdraw_balance - $cancel_consultation_money;
    return number_format($available_balance, 2);
}


function get_number_format($amount)
{
    return number_format($amount, 2, '.', '');
}

function decimal_to_int($amount)
{
    return number_format(number_format($amount, 2, '.', '') * 100, 0, '.', '');
}
function int_to_decimal($amount)
{
    return number_format($amount / 100, 2, '.', '');
}

function createTransaction($user_id, $amount, $type, $narration, $reference = null)
{
    $trn = new Transaction();
    $trn->hash = Str::uuid()->getHex();
    $trn->user_id = $user_id;
    $trn->amount = $amount;
    $trn->narration = $narration;
    $trn->type = $type;
    $trn->reference = $reference;
    $trn->save();
}

function appLanguages()
{
    return Language::where('status', 1)->get();
}

function selectedLanguage()
{
    $language = Language::where('iso_code', config('app.locale'))->first();
    if (!$language) {
        $language = Language::find(1);
        if ($language) {
            $ln = $language->iso_code;
            session(['local' => $ln]);
            App::setLocale(session()->get('local'));
        }
    }

    return $language;
}

function take_exam($exam_id)
{
    if (\App\Models\Take_exam::whereUserId(auth()->user()->id)->whereExamId($exam_id)->count() > 0) {
        return 'yes';
    } else {
        return 'no';
    }
}


function get_answer_class($exam_id, $question_id, $question_option_id)
{
    if (\App\Models\Answer::whereUserId(auth()->user()->id)->whereExamId($exam_id)->whereQuestionId($question_id)->whereQuestionOptionId($question_option_id)->count() > 0) {
        $answer = \App\Models\Answer::whereUserId(auth()->user()->id)->whereExamId($exam_id)->whereQuestionId($question_id)->whereQuestionOptionId($question_option_id)->orderBy('id', 'DESC')->first();
        if ($answer->is_correct == 'yes') {
            return 'given-answer-right';
        } else {
            return 'given-answer-wrong';
        }
    } else {
        $option = \App\Models\Question_option::find($question_option_id);
        if ($option->is_correct_answer == 'yes') {
            return 'correct-answer-was';
        } else {
            return '';
        }
    }
}

function get_total_score($exam_id)
{
    $exam = \App\Models\Exam::find($exam_id);
    return $exam->marks_per_question * $exam->questions->count();
}

function get_student_score($exam_id)
{
    $exam = \App\Models\Exam::find($exam_id);
    $number_of_correct_answer = \App\Models\Answer::whereUserId(auth()->user()->id)->whereExamId($exam_id)->whereIsCorrect('yes')->count();
    return $exam->marks_per_question * $number_of_correct_answer;
}

function get_student_by_student_score($exam_id, $user_id)
{
    $exam = \App\Models\Exam::find($exam_id);
    $number_of_correct_answer = \App\Models\Answer::whereUserId(auth()->user()->id)->whereExamId($exam_id)->whereIsCorrect('yes')->count();
    return $exam->marks_per_question * $number_of_correct_answer;
}

function get_position($exam_id)
{
    $take_exams = \App\Models\Take_exam::whereExamId($exam_id)->orderBy('number_of_correct_answer', 'DESC')->get();
    $list = [];
    foreach ($take_exams as $key => $take_exam) {
        $list[$take_exam->user_id] = $key + 1;
    }

    if (array_key_exists(auth()->user()->id, $list)) {
        return $list[auth()->user()->id];
    } else {
        return '0';
    }
}

function set_instructor_ranking_level($user_id)
{
    $userCourseIds = Course::where(['course_instructor.instructor_id' => $user_id, 'course_instructor.status' => STATUS_ACCEPTED])->join('course_instructor', 'courses.id', '=', 'course_instructor.course_id')->groupBy('courses.id')->pluck('courses.id')->toArray();
    $userBundleIds = Bundle::whereUserId($user_id)->pluck('id')->toArray();

    $orderBundleItemsCount = Order_item::whereIn('bundle_id', $userBundleIds)->where('course_id', null)
        ->whereYear("created_at", now()->year)->whereMonth("created_at", now()->month)
        ->whereHas('order', function ($q) {
            $q->where('payment_status', 'paid');
        })->count();

    $allOrderItems = Order_item::whereIn('course_id', $userCourseIds)->orWhereIn('bundle_id', $userBundleIds)->whereHas('order', function ($q) {
        $q->where('payment_status', 'paid');
    });

    $grand_total_earning = $allOrderItems->sum('owner_balance');
    $grand_total_enroll = $allOrderItems->count('id') - $orderBundleItemsCount;

    $rankLevel = RankingLevel::where('earning', '<=', $grand_total_earning)->where('student', '<=', $grand_total_enroll)->first();

    if (is_null($rankLevel)) {
        return null;
    } else {
        Instructor::where('user_id', $user_id)->update(['level_id' => $rankLevel->id]);
    }
}


function get_instructor_ranking_level($badges)
{
    $badge = $badges->where('type', RANKING_LEVEL_EARNING)->first();
    return !is_null($badge) ? $badge->name : NULL;
}

function getImageFile($file)
{
    return asset($file);
}

function getVideoFile($file)
{
    if ($file == '' || $file == null) {
        return null;
    }

    try {
        if (env('STORAGE_DRIVER') == "s3") {
            if (Storage::disk('s3')->exists($file)) {
                $s3 = Storage::disk('s3');
                return $s3->url($file);
            }
        }
    } catch (Exception $e) {
    }

    return asset($file);
}

function notificationForUser()
{
    $instructor_notifications = \App\Models\Notification::where('user_id', auth()->user()->id)->where('user_type', 2)->where('is_seen', 'no')->orderBy('created_at', 'DESC')->get();
    $student_notifications = \App\Models\Notification::where('user_id', auth()->user()->id)->where('user_type', 3)->where('is_seen', 'no')->orderBy('created_at', 'DESC')->get();
    return array('instructor_notifications' => $instructor_notifications, 'student_notifications' => $student_notifications);
}

function adminNotifications()
{
    return \App\Models\Notification::where('user_type', 1)->where('is_seen', 'no')->orderBy('created_at', 'DESC')->paginate(5);
}

function studentCourseProgress($course_id, $enrollment_id)
{
    $course = \App\Models\Course::whereId($course_id)->with('scorm_course')->first();
    if ($course->course_type == COURSE_TYPE_GENERAL) {
        $number_of_total_lecture = \App\Models\Course_lecture::where('course_id', $course_id)->count();
        $number_of_total_view_lecture = \App\Models\Course_lecture_views::where('course_id', $course_id)->where('enrollment_id', $enrollment_id)->where('user_id', auth()->user()->id)->count();
        $result = 0;
        if ($number_of_total_lecture) {
            $result = (($number_of_total_view_lecture * 100) / $number_of_total_lecture ?? 1);
        }
    } else {
        $enrollment = Enrollment::whereId($enrollment_id)->first();
        $result = ($enrollment) ? ($enrollment->completed_time / $course->scorm_course->duration_in_second) * 100 : 0;
    }

    return $result;
}


function getLeftDuration($start_date, $end_date)
{
    $startDate = date('d-m-Y H:i:s', strtotime($start_date));
    $endDate = date('d-m-Y H:i:s', strtotime($end_date));

    $secondsDifference = strtotime($endDate) - strtotime($startDate);

    //converting seconds to hours, minutes, seconds.
    $day = floor($secondsDifference / 86400);
    $hour = floor(($secondsDifference - ($day * 86400)) / 3600);
    $minute = floor(($secondsDifference / 60) % 60);
    $second = floor($secondsDifference % 60);

    if ($day > 0) {
        $day = $day . ($day > 1 ? ' days ' : ' day ');
        if ($hour > 0) {
            $hour = $hour . ($hour > 1 ? ' hours ' : ' hour ');
            return $day . $hour;
        }
        return $day;
    } elseif ($hour > 0) {
        $hour = $hour . ($hour > 1 ? ' hours ' : ' hour ');
        if ($minute) {
            $minute = $minute . ($minute > 1 ? ' minutes ' : ' minute ');
            return $hour . $minute;
        }
        return $hour;
    } elseif ($minute > 0) {
        $minute = $minute . ($minute > 1 ? ' minutes ' : ' minute ');
        return $minute;
    } elseif ($second > 0) {
        return $second;
    }
}

function lessonVideoDuration($course_id, $lesson_id)
{
    $lectures = \App\Models\Course_lecture::where('course_id', $course_id)->where('lesson_id', $lesson_id)->get();
    $video_duration = 0;
    $total_video_duration_in_seconds = 0;

    if ($lectures->count() > 0) {
        foreach ($lectures as $lecture) {
            if ($lecture->file_duration_second) {
                $total_video_duration_in_seconds +=  $lecture->file_duration_second;
            }
        }

        $h = floor($total_video_duration_in_seconds / 3600);
        $m = floor($total_video_duration_in_seconds % 3600 / 60);
        $s = floor($total_video_duration_in_seconds % 3600 % 60);

        if ($h > 0) {
            return "$h h $m m $s s";
        } elseif ($m > 0) {
            return "$m min $s sec";
        } elseif ($s > 0) {
            return "$s sec";
        }
    }

    return $video_duration;
}

function checkStudentCourseView($course_lecture_views, $course_id, $lecture_id)
{
    $views = $course_lecture_views->where('course_id', $course_id)->where('course_lecture_id', $lecture_id)->first();

    return $views;
}

function checkStudentCourseIsLock($course_lecture_views, $course, $lecture, $enrollment = NULL, $isFirst = false)
{
    $lock = 0;
    if ($course->drip_content == DRIP_SEQUENCE) {
        $views = $course_lecture_views->where('course_id', $course->id)->where('course_lecture_id', $lecture->id)->first();
        if ($views) {
            $lock = 0;
        } else {
            $lock = 1;
        }

        if($isFirst){
            $lock = 0;
        }
        else{
            $oldLecture = Course_lecture::where('course_id', $course->id)->where('id', '<', $lecture->id)->orderBy('id', 'DESC')->select('id')->first();
            $oldView = $course_lecture_views->where('course_id', $course->id)->where('course_lecture_id', @$oldLecture->id)->first();
            if($lock && $oldView){
                $lock = 0;
            }
        }
    } elseif ($course->drip_content == DRIP_AFTER_DAY) {
        $today = Carbon::now();
        $afterDay = $lecture->after_day ? $lecture->after_day : 0;
        $unlockDay = Carbon::parse($enrollment->start_date)->addDays($afterDay);

        if($unlockDay && Carbon::parse($unlockDay)->lte($today)){
            $lock = 0;
        }
        else{
            $lock = 1;
        }

    } elseif ($course->drip_content == DRIP_UNLOCK_DATE) {
        $today = Carbon::now();
        if($lecture->unlock_date && Carbon::parse($lecture->unlock_date)->lte($today)){
            $lock = 0;
        }
        else{
            $lock = 1;
        }
    } elseif ($course->drip_content == DRIP_PRE_IDS) {
        $pre_ids = $lecture->pre_ids ? json_decode($lecture->pre_ids) : [];
        $viewedIds = $course_lecture_views->pluck('course_lecture_id')->toArray();
        if (!array_diff($pre_ids, $viewedIds)) {
            $lock = 0;
        } else {
            $lock = 1;
        }
    }

    return $lock;
}

function checkIfExpired($enrollment)
{
    $today = now();
    $isExpired = Carbon::parse($enrollment->end_date)->gte($today);
    return $isExpired;
}

function checkIfLifetime($date)
{
    $isEqual = Carbon::parse($date)->eq(MAX_EXPIRED_DATE);
    return $isEqual;
}

function studentCoursesCount($user_id)
{
    $orderItems = Enrollment::where('user_id', $user_id)->count();

    return $orderItems;
}

function countUserReplies($user_id = null)
{
    return ForumPostComment::whereUserId($user_id)->count();
}

function getDayAvailableStatus($day)
{
    $item = InstructorConsultationDayStatus::where('user_id', Auth::id())->where('day', $day)->first();
    if ($item) {
        $status = 1;
    } else {
        $status = 0;
    }

    return $status;
}

function getInstructorTotalReview($user_id)
{
    $courseIds = Course::where('user_id', $user_id)->pluck('id')->toArray();
    return Review::whereIn('course_id', $courseIds)->count();
}

function getInstructorName($id)
{
    $user = Instructor::whereUserId($id)->first();
    return @$user->full_name ?? '';
}

function getBookingHistoryDetails($consultation_slot_id)
{
    $booking = BookingHistory::where('consultation_slot_id', $consultation_slot_id)->first();
    $bookingArray = [
        'time' => $booking->time ?? '',
        'type' => $booking->type ?? ''
    ];

    return $bookingArray;
}

function getBundleDetails($id)
{
    $bundle = Bundle::find($id);
    return $bundle;
}

function getUserAverageRating($user_id)
{
    $courseIds = Course::where('user_id', $user_id)->pluck('id')->toArray();

    $data['five_star_count'] = Review::whereIn('course_id', $courseIds)->whereRating(5)->count();
    $data['four_star_count'] = Review::whereIn('course_id', $courseIds)->whereRating(4)->count();
    $data['three_star_count'] = Review::whereIn('course_id', $courseIds)->whereRating(3)->count();
    $data['two_star_count'] = Review::whereIn('course_id', $courseIds)->whereRating(2)->count();
    $data['first_star_count'] = Review::whereIn('course_id', $courseIds)->whereRating(1)->count();

    $data['total_reviews'] = (5 * $data['five_star_count']) + (4 * $data['four_star_count']) + (3 * $data['three_star_count']) +
        (2 * $data['two_star_count']) + (1 * $data['first_star_count']);
    $data['total_user_review'] = $data['five_star_count'] + $data['four_star_count'] + $data['three_star_count'] + $data['two_star_count'] + $data['first_star_count'];

    if ($data['total_user_review'] > 0) {
        $average_rating = $data['total_reviews'] / $data['total_user_review'];
    } else {
        $average_rating = 0;
    }

    return $average_rating;
}

function courseStudents($course_id)
{
    $total_course_students = Enrollment::where('course_id', $course_id)->count();
    return $total_course_students;
}

function getCourseAffiliateAmount($course_id)
{
    return AffiliateHistory::where(['course_id' => $course_id, 'status' => AFFILIATE_HISTORY_STATUS_PAID])->sum('commission');
}

function cart_total_with_conversion_rate($payment_method,$carts=null){
    if(is_null($carts)){
        $carts = CartManagement::whereUserId(@Auth::user()->id)->get();
    }
    $grand_total = get_platform_charge($carts->sum('price'))+$carts->sum('price');

    if ($payment_method == 'paypal') {
        $conversion_rate = get_option('paypal_conversion_rate') ? get_option('paypal_conversion_rate') : 0;
    } elseif ($payment_method == 'stripe') {
        $conversion_rate = get_option('stripe_conversion_rate') ? get_option('stripe_conversion_rate') : 0;
    } elseif ($payment_method == 'bank') {
        $conversion_rate = get_option('bank_conversion_rate') ? get_option('bank_conversion_rate') : 0;
    } elseif ($payment_method == 'mollie') {
        $conversion_rate = get_option('mollie_conversion_rate') ? get_option('mollie_conversion_rate') : 0;
    } elseif ($payment_method == 'instamojo') {
        $conversion_rate = get_option('im_conversion_rate') ? get_option('im_conversion_rate') : 0;
    } elseif ($payment_method == 'paystack') {
        $conversion_rate = get_option('paystack_conversion_rate') ? get_option('paystack_conversion_rate') : 0;
    }  elseif ($payment_method == 'sslcommerz') {
        $conversion_rate = get_option('sslcommerz_conversion_rate') ? get_option('sslcommerz_conversion_rate') : 0;
    }

    return $grand_total*$conversion_rate;
}

function distributeCommission($order){
    foreach ($order->items as $order_item) {
        $ownerId = $order_item->owner_user_id;
        $distributedAmount = 0;
        if(!is_null($order_item->course_id)){
            $courseInstructors = CourseInstructor::where('course_id', $order_item->course_id)->whereStatus(STATUS_ACCEPTED)->get();
            foreach($courseInstructors as $courseInstructor){
                $user_id = $courseInstructor->instructor_id;
                if($ownerId != $user_id){
                    $balance = ($order_item->owner_balance/100) * ($courseInstructor->share);
                    $distributedAmount += $balance;
                    if($balance > 0){
                        createTransaction($user_id, $balance, TRANSACTION_SELL, 'Earning via sell', 'Order_item (' . $order_item->id . ')');
                        $owner_user = User::find($user_id);
                        if ($owner_user) {
                            $owner_user->increment('balance', decimal_to_int($balance));
                        }
                    }
                }
            }
        }

        $remainingBalance = $order_item->owner_balance-$distributedAmount;
        if($remainingBalance > 0){
            createTransaction($ownerId, $remainingBalance, TRANSACTION_SELL, 'Earning via sell', 'Order_item (' . $order_item->id . ')');
            $owner_user = User::find($ownerId);
            if ($owner_user) {
                $owner_user->increment('balance', decimal_to_int($remainingBalance));
            }
        }
    }

    $affiliateHistory = AffiliateHistory::whereOrderItemId($order_item->id)->first();
    if ($affiliateHistory) {
        $refUser = User::find($affiliateHistory->user_id);
        $refUser->increment('balance', decimal_to_int($affiliateHistory->commission));
        createTransaction($refUser->id, $affiliateHistory->commission, TRANSACTION_AFFILIATE, AFFILIATE_NARRATION);
        $affiliateHistory->update(['status' => AFFILIATE_HISTORY_STATUS_PAID]);
    }

    setEnrollment($order_item);
    setBadge($order_item->user_id);
}



if(!function_exists('hasLimit')){
    function hasLimit($type, $count){
        if(get_option('subscription_mode')){
            $userPackage = UserPackage::join('packages', 'packages.id', '=', 'user_packages.package_id')->where('package_type', PACKAGE_TYPE_SUBSCRIPTION)->where('user_packages.user_id', auth()->id())->where('user_packages.status', PACKAGE_STATUS_ACTIVE)->whereDate('enroll_date', '<=', now())->whereDate('expired_date', '>=', now())->with('enrollments')->select('user_packages.*')->first();
            if($type == PACKAGE_RULE_COURSE){
                $limit = @$userPackage->course;
            }
            else if($type == PACKAGE_RULE_BUNDLE_COURSE){
                $limit = @$userPackage->bundle_course;
            }
            else if($type == PACKAGE_RULE_CONSULTANCY){
                $limit = @$userPackage->consultancy;
            }

            $used = (@$userPackage->enrollments) ? @$userPackage->enrollments->count() : 0;

            if($limit >= ($used + $count)){
                return true;
            }

            return false;
        }
        else{
            return true;
        }
    }
}

if(!function_exists('hasLimitSaaS')){
    function hasLimitSaaS($type, $package_type, $count){
        if(get_option('saas_mode')){
            $userPackage = UserPackage::join('packages', 'packages.id', '=', 'user_packages.package_id')->where('package_type', $package_type)->where('user_packages.user_id', auth()->id())->where('user_packages.status', PACKAGE_STATUS_ACTIVE)->whereDate('enroll_date', '<=', now())->whereDate('expired_date', '>=', now())->select('user_packages.*')->first();
            if($type == PACKAGE_RULE_STUDENT){
                $limit = @$userPackage->student;
            }
            else if($type == PACKAGE_RULE_COURSE){
                $limit = @$userPackage->course;
            }
            else if($type == PACKAGE_RULE_BUNDLE_COURSE){
                $limit = @$userPackage->bundle_course;
            }
            else if($type == PACKAGE_RULE_SUBSCRIPTION_COURSE){
                $limit = @$userPackage->subscription_course;
            }
            else if($type == PACKAGE_RULE_CONSULTANCY){
                $limit = @$userPackage->consultancy;
            }

            if($limit >= $count+1){
                return true;
            }

            return false;
        }
        else{
            return true;
        }
    }
}

if (!function_exists('getSlug')) {
    function getSlug($text)
    {
        if($text){
            $data = preg_replace("/[~`{}.'\"\!\@\#\$\%\^\&\*\(\)\_\=\+\/\?\>\<\,\[\]\:\;\|\\\]/", "", $text);
            $slug = preg_replace("/[\/_|+ -]+/", "-", $data);
            return $slug;
        }
        return '';
    }
}

if (!function_exists('setEnrollment')) {
    function setEnrollment($item)
    {
        $enrollment = new Enrollment();
        $enrollment->order_id = $item->order_id;
        $enrollment->user_id = $item->user_id;
        $enrollment->owner_user_id = $item->owner_user_id;
        $enrollment->bundle_id = $item->bundle_id;
        $enrollment->course_id = $item->course_id;
        $enrollment->consultation_slot_id = $item->consultation_slot_id;
        if($item->consultation_slot_id != NULL){
            $consultationSlot =  $item->consultationSlot;
            if(!is_null($consultationSlot)){
                $fullTime = explode(' - ', $consultationSlot->time);
                $startDate = $consultationSlot->date.' '.date("H:i", strtotime($fullTime[0]));
                $endDate = $consultationSlot->date.' '.date("H:i", strtotime($fullTime[1]));
                $enrollment->start_date = date("Y-m-d H:i:s", strtotime($startDate));
                $enrollment->end_date = date("Y-m-d H:i:s", strtotime($endDate));
            }
        }
        elseif($item->bundle_id != NULL){
            //update status to deactivated if already valid in enrollment table
            Enrollment::where(['course_id' => $item->course_id, 'user_id' => auth()->id(), 'status' => ACCESS_PERIOD_ACTIVE])->whereDate('end_date', '>=', now())->update(['status' => ACCESS_PERIOD_DEACTIVATE]);
            $enrollment->start_date = now();
            $enrollment->end_date = ($item->bundle->access_period) ? Carbon::now()->addDays($item->bundle->access_period) : MAX_EXPIRED_DATE;
        }
        else{
            $enrollment->start_date = now();
            $enrollment->end_date = ($item->course->access_period) ? Carbon::now()->addDays($item->course->access_period) : MAX_EXPIRED_DATE;
        }

        $enrollment->save();
        return $enrollment;
    }
}


if (!function_exists('getUserRoleRelation')) {
    function getUserRoleRelation($user)
    {
        if($user->role == USER_ROLE_INSTRUCTOR){
            $return = 'instructor';
        }
        elseif($user->role == USER_ROLE_ORGANIZATION){
            $return = 'organization';
        }
        else{
            $return = 'student';
        }

        return $return;
    }
}

if (!function_exists('selectStatement')) {
    function selectStatement()
    {
        return 'case when org.id is null then ins.uuid else org.uuid end as uuid,
        case when org.id is null then ins.country_id else org.country_id end as country_id,
        case when org.id is null then ins.province_id else org.province_id end as province_id,
        case when org.id is null then ins.state_id else org.state_id end as state_id,
        case when org.id is null then ins.city_id else org.city_id end as city_id,
        case when org.id is null then ins.professional_title else org.professional_title end as professional_title,
        case when org.id is null then ins.postal_code else org.postal_code end as postal_code,
        case when org.id is null then ins.address else org.address end as address,
        case when org.id is null then ins.about_me else org.about_me end as about_me,
        case when org.id is null then ins.gender else org.gender end as gender,
        case when org.id is null then ins.social_link else org.social_link end as social_link,
        case when org.id is null then ins.slug else org.slug end as slug,
        case when org.id is null then ins.is_private else org.is_private end as is_private,
        case when org.id is null then ins.remove_from_web_search else org.remove_from_web_search end as remove_from_web_search,
        case when org.id is null then ins.is_offline else org.is_offline end as is_offline,
        case when org.id is null then ins.offline_message else org.offline_message end as offline_message,
        case when org.id is null then ins.consultation_available else org.consultation_available end as consultation_available,
        case when org.id is null then ins.hourly_rate else org.hourly_rate end as hourly_rate,
        case when org.id is null then ins.hourly_old_rate else org.hourly_old_rate end as hourly_old_rate,
        case when org.id is null then ins.available_type else org.available_type end as available_type,
        case when org.id is null then ins.created_at else org.created_at end as approval_date';
    }
}


if (!function_exists('setBadge')) {
    function setBadge($id)
    {
        $user = User::whereId($id)->with('instructor.enrollments.order')->with('organization.enrollments.order')->first();
        if($user->role == USER_ROLE_INSTRUCTOR || $user->role == USER_ROLE_ORGANIZATION){
            $badges = RankingLevel::all();
            $relation = getUserRoleRelation($user);

            if(!is_null($user->$relation)){
                $enrollments = $user->$relation->enrollments;
                $approvalDuration = Carbon::parse($user->$relation->created_at)->diffInDays(now());
                $totalEarning = $enrollments->map(function ($enrollment) {
                    if($enrollment->order){
                        return $enrollment->order->sum('sub_total');
                    }
                })->sum();
                $totalSale = $enrollments->count();
            }
            else{
                $approvalDuration = Carbon::parse($user->created_at)->diffInDays(now());
                $totalSale = 0;
                $totalEarning = 0;
            }
            
            $totalStudentCount = Enrollment::where('owner_user_id', $user->id)->groupBy('user_id')->count();
            $totalCourse = Course::where('user_id', $user->id)->count();

            //set membership badge
            $typeArray = [RANKING_LEVEL_REGISTRATION => $approvalDuration, RANKING_LEVEL_EARNING => $totalEarning, RANKING_LEVEL_COURSES_COUNT => $totalSale, RANKING_LEVEL_STUDENTS_COUNT => $totalStudentCount, RANKING_LEVEL_COURSES_SALE_COUNT => $totalCourse];
            foreach($typeArray as $type => $value){
                $userBadge = UserBadge::where('user_id', $user->id)->join('ranking_levels', 'ranking_levels.id', '=', 'user_badges.ranking_level_id')->where('type', $type)->first();
                $rule = $badges->where('type', $type)->where('from', '<=', $value)->where('to', '>=', $value)->first();
                $maxRule = $badges->where('type', $type)->where('to', '<=', $value)->sortByDesc('from')->first();
                $ranking_level_id = NULL;
                if(!is_null($rule)){
                    $ranking_level_id = $rule->id;
                }
                elseif(!is_null($maxRule)){
                    $ranking_level_id = $maxRule->id;
                }

                if(!is_null($userBadge) && !is_null($ranking_level_id)){
                    $userBadge->updateOrCreate(['ranking_level_id' => $ranking_level_id]);
                }
                elseif(!is_null($ranking_level_id)){
                    UserBadge::create(['user_id' => $user->id, 'ranking_level_id' => $ranking_level_id]);
                }
            }
        }
    }
}


if (!function_exists('getCustomerCurrentBuildVersion')) {
    function getCustomerCurrentBuildVersion(){
        $buildVersion = get_option('app_version');
        
        if(is_null($buildVersion)){
            return 1;
        }

        return (int)$buildVersion;
    }
}

if (!function_exists('setCustomerBuildVersion')) {
    function setCustomerBuildVersion($version){
        $option = Setting::firstOrCreate(['option_key' => 'app_version']);
        $option->option_value = $version;
        $option->save();
    }
}

if (!function_exists('setCustomerCurrentVersion')) {
    function setCustomerCurrentVersion(){
        $option = Setting::firstOrCreate(['option_key' => 'current_version']);
        $option->option_value = config('app.current_version');
        $option->save();
    }
}