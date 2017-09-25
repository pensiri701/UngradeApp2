<?php

namespace App\Http\Middleware;

use Closure;

class StudentAuthen
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      /*
        if (!\Session::get('login') || !\Session::get('login_type') != 'student') {
            abort(404);
        }
      */

            if (!\Session::get('userID') || !\Session::get('userName') != '') {
                return redirect('/login');
            }

        return $next($request);
    }

}
