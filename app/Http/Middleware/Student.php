<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Student
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        /**
         * role 2 instructor
         * role 3 student
         * role 4 organization
         * instructor & student & organization both can access student panel
         */

        if (file_exists(storage_path('installed'))) {
            if (in_array(auth()->user()->role, [USER_ROLE_STUDENT, USER_ROLE_INSTRUCTOR, USER_ROLE_ORGANIZATION])) {
                if (auth()->user()->student->status == STATUS_APPROVED) {
                    return $next($request);
                } else {
                    abort('403');
                }
            } else {
                abort('403');
            }
        } else {
            return redirect()->to('/install');
        }
    }
}
