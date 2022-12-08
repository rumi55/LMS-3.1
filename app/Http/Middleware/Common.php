<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Common
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        /**
         * role 2 instructor
         * only instructor can access instructor panel
         */

        if (file_exists(storage_path('installed'))) {
                if (!empty(Auth::user()) && in_array(auth()->user()->role, [USER_ROLE_STUDENT, USER_ROLE_INSTRUCTOR, USER_ROLE_ORGANIZATION])) {
                    return $next($request);
                } else {
                    if(request()->wantsJson()){
                        $response['msg'] = __("You don't have the permission");
                        $response['status'] = 403;
                        return response()->json($response, 403);
                    }
                    else{
                        abort('403');
                    }

                }
        } else {
            return redirect()->to('/install');
        }
    }
}
