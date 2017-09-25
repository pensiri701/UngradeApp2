<?php

namespace App\Http\Middleware;

use Closure;

class StaffAuthen
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

      if (!\Session::get('userID') || !\Session::get('userName') != '') {
          return redirect('/stafflogin');
      }

        return $next($request);
    }

}
