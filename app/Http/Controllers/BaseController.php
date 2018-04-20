<?php

namespace App\Http\Controllers;

use App\CardCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
	public function __construct()
	{
		//its just a dummy data object.
		$category = CardCategory::all();

		// Sharing is caring
		View::share('menu_category', $category);
	}
}
