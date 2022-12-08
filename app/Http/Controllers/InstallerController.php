<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Traits\General;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
ini_set('max_execution_time', 3600);

class InstallerController extends Controller
{
    use General;

    public function notificationUrl($uuid)
    {
        $notification = \App\Models\Notification::whereUuid($uuid)->first();
        $notification->is_seen = 'yes';
        $notification->save();

        if (is_null($notification->target_url))
        {
            return redirect(url()->previous());

        } else {
            return redirect($notification->target_url);
        }
    }

}
