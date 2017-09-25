<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Cookie;
use Session;

class AuthController extends Controller
{
	public function login(Request $request)
	{
		return view('login');
	}

	public function logout()
	{
		Session::flush();
		Auth::logout();
		return redirect()->route('loginform');
	}

	public function loginAttempt(Request $request)
	{
		$username = $request->get('username');
		$password = $request->get('password');

       //echo csrf_token();
	   // dd(\Hash::make('12345'));
		// pass for administrator  = wizard
		Session::flush();
		Auth::logout();
		if (Auth::attempt(array('username' => $username, 'password' => $password), true)) {
			$user = student::where('student_id', '=', $username)->first();

			$data['username'] = $user->username;

			//$test= $this->role =$user->roles->first()->name;
		   // dd($test);

			/**
			 * Set profile user to session variable
			 */
			Session::put('user', $data);
			session()->put('user', $data);


			if ($user->username !="") {
				echo $user->username ;
				//return redirect()->to('funrun');
			}


		} else {
			return redirect()->to('login')
								->withErrors(['login' => true])
								->withInput($request->except('password'));
		}
	}
}
