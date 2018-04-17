<?php

namespace App\Http\Controllers\Admin;

use App\CardCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CardCategoryController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth:admin');
	}

	public function index() {
		$edit = '';
		$categories = CardCategory::all();
		return view('admin.cards.category', compact('categories', 'edit'));
	}

	public function store(Request $request) {
		$this->validate($request, [
			'name' => 'required|unique:card_categories|max:255',
			//'slug' => 'required|unique:developer_portfolio_categories|max:255',
		]);
		CardCategory::create([
			'name' => $request['name'],
			//'slug' => str_slug($request['slug']),
		]);
		return redirect()->route('admin.cards.category')->with("message", "Category Inserted");
	}

	public function show($id) {
		$edit = '';
		$categories = CardCategory::all();
		return view('admin.cards.category', compact('categories', 'edit'));
	}

	public function edit($id = "") {
		$edit = $id;
		$categories = CardCategory::all();
		return view('admin.cards.category', compact('categories', 'edit'));
	}

	public function update(Request $request, $id) {
		$rules = [
			'name' => 'required',
			//'slug' => 'required',
		];

		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			return Redirect()->back()->withErrors($validator);
		} else {
			// No validation error...
			// Insert data into database..
			CardCategory::where('id', $id)
			                          ->update([
				                          'name' => $request->name,
				                          //'slug' => $request->slug,
			                          ]);
			return redirect()->route('admin.cards.category')->with("message", "Category Updated");
		}
	}

	public function destroy($id) {
		$check = CardCategory::find($id)->delete();
		//$check->delete();
		return redirect()->route('admin.cards.category')->with("message", "Category Deleted");
	}
}
