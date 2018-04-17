<?php

namespace App\Http\Controllers\Admin;

use App\Card;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CardsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:admin');
	}

	public function index() {
		$cards = Card::all();
		return view('admin.cards.index', compact('cards'));
    }

	public function create() {
		return view('admin.cards.create');
	}

	public function store(Request $request) {
		$this->validate($request, [
			'title' => 'required|unique:card|max:255',
			'info' => 'required',
			'status' => 'required',
		]);
		Card::create([
			'title' => $request['title'],
			'info' => $request['info'],
			'status' => $request['status'],
		]);
		return redirect()->route('admin.cards')->with("message", "Card Added");
	}

	public function edit($id = "") {
		$edit = $id;
		$card = Card::where('id','=',$id)->first();
		return view('admin.cards.create', compact('card', 'edit'));
	}

	public function update(Request $request, $id) {
		$rules = [
			'title' => 'required',
			'info' => 'required',
			'status' => 'required',
		];

		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			return Redirect()->back()->withErrors($validator);
		} else {
			// No validation error...
			// Insert data into database..
			Card::where('id', $id)
			            ->update([
				            'title' => $request['title'],
				            'info' => $request['info'],
				            'status' => $request['status'],
			            ]);
			return redirect()->route('admin.cards')->with("message", "Card Updated");
		}
	}

	public function destroy($id) {
		$check = Card::find($id)->delete();
		return redirect()->route('admin.cards')->with("message", "Card Deleted");
	}
}
