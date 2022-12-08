<?php

namespace App\Http\Middleware;

use App\Traits\General;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VersionUpdate
{

    public function handle(Request $request, Closure $next)
    {
        /* $code_app_version = config('app.app_version');
        $db_app_version = get_option('app_version');
        if (($code_app_version == 2 && ($db_app_version == null || $db_app_version < 2)) || ($code_app_version == 3 && $db_app_version < 3)) {
            Auth::logout();
            if (!file_exists(storage_path('installed'))) {
                return redirect()->to('/install');
            }
            return redirect()->to('/version-update');

        } */
        return $next($request);
    }
}
