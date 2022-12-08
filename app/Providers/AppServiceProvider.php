<?php

namespace App\Providers;

use App\Models\CartManagement;
use App\Models\Category;
use App\Models\Language;
use App\Models\Menu;
use App\Models\Notification;
use App\Models\Setting;
use App\Models\Wishlist;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrapFive();

        /**
         * Create Some Buttons
         */
        Blade::include('layouts.element.form.save-with-another', 'saveWithAnotherButton');
        Blade::include('layouts.element.form.update-button', 'updateButton');


        Blade::if('admin',function (){
            return auth()->check() && auth()->user()->role == 1;
        });

        Blade::if('instructor',function (){
            return auth()->check() && auth()->user()->role == 2;
        });

        Blade::if('student',function (){
            return auth()->check() && auth()->user()->role == 3;
        });

        View::composer('frontend.layouts.navbar', function ($view) {
            $data['categories'] = Category::with('subcategories')->active()->get();
            $data['cartQuantity'] = CartManagement::whereUserId(@Auth::user()->id)->count();
            $data['wishlistQuantity'] = Wishlist::whereUserId(@Auth::user()->id)->count();
            $data['menus'] = Menu::all();
            $data['staticMenus'] = Menu::active()->whereType(1)->get();
            $data['dynamicMenus'] = Menu::active()->whereType(2)->get();

            $data['student_notifications'] = Notification::where('user_id', @auth()->user()->id)->where('user_type', 3)->where('is_seen', 'no')->orderBy('created_at', 'DESC')->get();
            $data['instructor_notifications'] = Notification::where('user_id', @auth()->user()->id)->where('user_type', 2)->where('is_seen', 'no')->orderBy('created_at', 'DESC')->get();
            $view->with($data);
        });

        View::composer('frontend.layouts.footer', function ($view) {
            $data['menus'] = Menu::active()->get();
            $data['dynamicMenus'] = Menu::active()->whereType(2)->get();
            $view->with($data);
        });

        View::composer('admin.common.header', function ($view) {
            $data['adminNotifications'] = Notification::where('user_type', 1)->where('is_seen', 'no')->orderBy('created_at', 'DESC')->get();
            $count = 0;
            foreach ($data['adminNotifications'] as $notification) {
                if ($notification->sender){
                    $count++;
                }
            }
            $data['totalAdminNotifications'] = $count;
            $view->with($data);
        });

        try {
            $connection = DB::connection()->getPdo();
            if ($connection){
                $allOptions = [];
                $allOptions['settings'] = Setting::all()->pluck('option_value', 'option_key')->toArray();
                config($allOptions);
            }

            $language = Language::where('default_language', 'on')->first();
            if ($language) {
                $ln = $language->iso_code;
                session(['local' => $ln]);
                App::setLocale(session()->get('local'));
            } else {
                $language = Language::find(1);
                if ($language){
                    $ln = $language->iso_code;
                    session(['local' => $ln]);
                    App::setLocale(session()->get('local'));
                }
            }
        } catch (\Exception $e) {
            //
        }

    }
}
