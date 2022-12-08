<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Home;
use App\Traits\General;
use App\Traits\ImageSaveTrait;
use Illuminate\Http\Request;
use Auth;

class HomeSettingController extends Controller
{
    use General, ImageSaveTrait;

    public function sectionSettings()
    {
        if (!Auth::user()->can('home_setting')) {
            abort('403');
        } // end permission checking

        $data['title'] = 'Section Settings';
        $data['navApplicationSettingParentActiveClass'] = 'mm-active';
        $data['subNavHomeSettingsActiveClass'] = 'mm-active';
        $data['sectionSettingsActiveClass'] = 'active';
        $data['home'] = Home::first();

        return view('admin.application_settings.home.section-settings', $data);
    }

    public function sectionSettingsStatusChange(Request $request)
    {
        $attribute_name = $request->attribute_name;
        $status = $request->status;
        $home = Home::first();
        if ($attribute_name) {
            $home->update([
                $attribute_name => $status,
            ]);
        }

        return response()->json([
            'msg' => 'success'
        ]);
    }


    public function bannerSection()
    {
        if (!Auth::user()->can('home_setting')) {
            abort('403');
        } // end permission checking

        $data['title'] = 'Banner Section';
        $data['navApplicationSettingParentActiveClass'] = 'mm-active';
        $data['subNavHomeSettingsActiveClass'] = 'mm-active';
        $data['bannerSectionActiveClass'] = 'active';
        $data['home'] = Home::first();

        return view('admin.application_settings.home.banner-section', $data);
    }

    public function bannerSectionUpdate(Request $request)
    {
        if (!Auth::user()->can('home_setting')) {
            abort('403');
        } // end permission checking

        $request->validate([
            'banner_image' => 'mimes:png,svg|file|max:1024'
        ]);

        $home = Home::first();
        if (!$home) {
            $home = new Home();
            if ($request->hasFile('banner_image')) {
                $home->banner_image = $this->saveImage('home', $request->banner_image, 'null', 'null');
            }

        } else {
            if ($request->hasFile('banner_image')) {
                $home->banner_image = $this->updateImage('home', $request->banner_image, $home->banner_image, 'null', 'null');
            }
        }

        $home->banner_mini_words_title = $request->banner_mini_words_title;
        $home->banner_first_line_title = $request->banner_first_line_title;
        $home->banner_second_line_title = $request->banner_second_line_title;
        $home->banner_second_line_changeable_words = $request->banner_second_line_changeable_words;
        $home->banner_third_line_title = $request->banner_third_line_title;
        $home->banner_subtitle = $request->banner_subtitle;

        $home->banner_first_button_name = $request->banner_first_button_name;
        $home->banner_first_button_link = $request->banner_first_button_link;

        $home->banner_second_button_name = $request->banner_second_button_name;
        $home->banner_second_button_link = $request->banner_second_button_link;
        $home->save();

        $this->showToastrMessage('success', __('Updated Successfully'));
        return redirect()->back();
    }

    public function specialFeatureSection()
    {
        if (!Auth::user()->can('home_setting')) {
            abort('403');
        } // end permission checking

        $data['title'] = 'Home Special Feature Section';
        $data['navApplicationSettingParentActiveClass'] = 'mm-active';
        $data['subNavHomeSettingsActiveClass'] = 'mm-active';
        $data['specialSectionActiveClass'] = 'active';

        return view('admin.application_settings.home.special-feature-section', $data);
    }

    public function courseSection()
    {
        if (!Auth::user()->can('home_setting')) {
            abort('403');
        } // end permission checking

        $data['title'] = 'Course Section';
        $data['navApplicationSettingParentActiveClass'] = 'mm-active';
        $data['subNavHomeSettingsActiveClass'] = 'mm-active';
        $data['courseSectionActiveClass'] = 'active';

        return view('admin.application_settings.home.course-section', $data);
    }

    public function bundleCourseSection()
    {
        if (!Auth::user()->can('home_setting')) {
            abort('403');
        } // end permission checking

        $data['title'] = 'Bundle Course Section';
        $data['navApplicationSettingParentActiveClass'] = 'mm-active';
        $data['subNavHomeSettingsActiveClass'] = 'mm-active';
        $data['bundleCourseSectionActiveClass'] = 'active';

        return view('admin.application_settings.home.bundle-course-section', $data);
    }

    public function topCategorySection()
    {
        if (!Auth::user()->can('home_setting')) {
            abort('403');
        } // end permission checking

        $data['title'] = 'Top Category Section';
        $data['navApplicationSettingParentActiveClass'] = 'mm-active';
        $data['subNavHomeSettingsActiveClass'] = 'mm-active';
        $data['topCategorySectionActiveClass'] = 'active';

        return view('admin.application_settings.home.top-category-section', $data);
    }

    public function topInstructorSection()
    {
        if (!Auth::user()->can('home_setting')) {
            abort('403');
        } // end permission checking

        $data['title'] = 'Top Instructor Section';
        $data['navApplicationSettingParentActiveClass'] = 'mm-active';
        $data['subNavHomeSettingsActiveClass'] = 'mm-active';
        $data['topInstructorSectionActiveClass'] = 'active';

        return view('admin.application_settings.home.top-instructor-section', $data);
    }

    public function becomeInstructorVideoSection()
    {
        if (!Auth::user()->can('home_setting')) {
            abort('403');
        } // end permission checking

        $data['title'] = 'Become Instructor Video Section';
        $data['navApplicationSettingParentActiveClass'] = 'mm-active';
        $data['subNavHomeSettingsActiveClass'] = 'mm-active';
        $data['becomeInstructorVideoSectionActiveClass'] = 'active';

        return view('admin.application_settings.home.become-instructor-video-section', $data);
    }

    public function customerSaySection()
    {
        if (!Auth::user()->can('home_setting')) {
            abort('403');
        } // end permission checking

        $data['title'] = 'Customer Say Section';
        $data['navApplicationSettingParentActiveClass'] = 'mm-active';
        $data['subNavHomeSettingsActiveClass'] = 'mm-active';
        $data['customerSaySectionActiveClass'] = 'active';

        return view('admin.application_settings.home.customer-say-section', $data);
    }

    public function achievementSection()
    {
        if (!Auth::user()->can('home_setting')) {
            abort('403');
        } // end permission checking

        $data['title'] = 'Achievement Section';
        $data['navApplicationSettingParentActiveClass'] = 'mm-active';
        $data['subNavHomeSettingsActiveClass'] = 'mm-active';
        $data['achievementSectionActiveClass'] = 'active';

        return view('admin.application_settings.home.achievement-section', $data);
    }
}
