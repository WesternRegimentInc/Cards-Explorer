<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CardToCategoriesController extends Controller
{
	public function __construct()
	{
		$this->middleware('admin_auth:admin');
	}
}
