<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Admin;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:admin');
	}
	public function index()
	{
		$users = Admin::all();
		return view('admin.users.admin', compact('users'));
	}

	public function create()
	{
		return view('admin.users.create');
	}

	public function store(Request $request)
	{
		$rules = [
			'name' => 'required|unique:admins',
			'email' => 'required|email|unique:admins',
			'phone' => 'required',
			'password' => 'required',
			//'role_id' => 'required',
			//'image' => 'required',
		];
		$validator = Validator::make($request->all(), $rules);
		if($validator->fails()){
			return Redirect()->back()->withErrors($validator);
		} else {
			// No validation error...
			// Insert data into database..
			Admin::create([
				'name' => $request['name'],
				'email' => $request['email'],
				'phone' => $request['phone'],
				'password' => bcrypt($request['password']),
				//'post' => $request['role_id'],
				//'avatar' => $request['image'],
			]);
			return redirect()->route('admin.list')->with("message", "User Created");
		}
	}

	public function show($id)
	{
		$user = Admin::find($id);
		return view('admin.users.view-admin', compact('user'));
	}

	public function edit($id)
	{
		if($id != null){
			$dataTypeContent = Admin::find($id);
		}
		return view('admin.users.create', compact('dataTypeContent'));
	}

	public function update(Request $request, $id)
	{
		$rules = [
			'name' => 'required',
			'email' => 'required|email',
			'phone' => 'required',
		];

		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			return Redirect()->back()->withErrors($validator);
		} else {

			// No validation error...
			// Insert data into database..
			if($request['password'] == ''){
				Admin::where('id', $id)
				     ->update([
					     'name' => $request['name'],
					     'email' => $request['email'],
					     'phone' => $request['phone'],
					     //'post' => $request['role_id'],
					     //'avatar' => $request['image'],
				     ]);
			}else{
				Admin::where('id', $id)
				     ->update([
					     'name' => $request['name'],
					     'email' => $request['email'],
					     'phone' => $request['phone'],
					     'password' => bcrypt($request['password']),
					     //'post' => $request['role_id'],
					     //'avatar' => $request['image'],
				     ]);
			}
			return redirect()->route('admin.list')->with("message", "Admin Updated");
		}
	}

	public function destroy($id) {
		$check = Admin::where('id', $id)->first();
		$deleted = $check->delete();
		if ($deleted) {
			return redirect()->route('admin.list')->with("message", "Post Deleted");
		} else {
			return redirect()->route('admin.list')->withErrors("Cannot delete post");
		}
	}

	public function profile(){
		return view('admin.users.profile');
	}
}
