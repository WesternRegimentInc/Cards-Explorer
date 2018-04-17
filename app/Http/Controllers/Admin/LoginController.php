<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\MessageBag;
//Class needed for login and Logout logic
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Admin Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles authenticating users for the application and
	| redirecting them to your home screen. The controller uses a trait
	| to conveniently provide its functionality to your applications.
	|
	*/

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = 'admin/dashboard';

	//Trait
	use AuthenticatesUsers {
		logout as performLogout;
	}

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('admin_guest');
	}

	//Custom guard for Admin
	protected function guard()
	{
		return Auth::guard('admin');
	}

	public function showLoginForm(){
		return view('admin.auth.login');
	}
	protected function validateLogin(Request $request)
	{
		$this->validate($request, [
			$this->username() => 'required|string|email',
			'password' => 'required|string',
		]);
	}
	/*
	public function login(Request $request)
	{
		$errors = new MessageBag();
		$val = $this->validate($request, [
			'email' => 'required|email',
			'password' => 'required|min:4',
		]);
		$credentials = [
			'email' =>$request->email,
			'password' =>$request->password,
			//'is_admin' => 1,
		];
		//$remember = $request->remember;
		//Attempt to login admin
		if ( Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember) ){
			// Redirect to intended page
			return redirect()->intended(route('admin.dashboard'));
		}
		$errors = new MessageBag(['password' => ['Incorrect email/password combination']]);
		return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors($errors);
	}
	*/
	public function logout(Request $request)
	{
		$this->performLogout($request);
		return redirect()->route('admin.login');
	}
}
