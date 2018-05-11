<?php

namespace App\Http\Controllers\Admin;

use App\Card;
use App\CardCategory;
use App\CardDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class CardsController extends Controller
{
	public function __construct()
	{
		$this->middleware('admin_auth:admin');
	}

	public function index() {
		$cards = Card::leftJoin('card_details','cards.id','=','card_details.card_id')
		             //->where('cards.id','=','')
		             ->select('*','cards.id as cid','card_details.id as did','card_details')->get();
		return view('admin.cards.index', compact('cards'));
    }

	public function create() {
		$categories = CardCategory::all();
		return view('admin.cards.create', compact('categories'));
	}

	public function show($id) {
		$card = Card::leftJoin('card_details','cards.id','=','card_details.card_id')
		            ->where('cards.id','=',$id)
		            ->select('*','cards.id as cid','card_details.id as did','card_details')->get();
		return $card;
	}

	public function store(Request $request) {
		$this->validate($request, [
			'title' => 'required|unique:card|max:255',
			'info' => 'required',
			'status' => 'required',
			'card_category' => 'required',
			'card_details' => 'required',
			'apply_link' => 'required',
			'intro_apr' => 'required',
			'regular_apr' => 'required',
			'annual_fee' => 'required|integer',
			'credit_score' => 'required|integer',
			'image' => 'required|image|max:10000',
		]);
		$card = Card::create([
			'title' => $request['title'],
			'info' => $request['info'],
			'status' => $request['status'],
		]);
		$cardDetail = CardDetail::create([
			'card_id' => $card->id,
			'card_details' => $request['card_details'],
			'apply_link' => $request['apply_link'],
			'intro_apr' => $request['intro_apr'],
			'regular_apr' => $request['regular_apr'],
			'card_category' => $request['card_category'],
			'annual_fee' => $request['annual_fee'],
			'credit_score' => $request['credit_score'],
		]);

		/*
             * First make sure the avatar directory of the current user is ready by;
             * checking if its readable ie. if it available,
             * if not create the folder
             */
		// user avatar path..
		$path = storage_path().'/app/public/images/'.$cardDetail->id;

		try{
			//check if path exists
			if(!File::exists($path)) {
				// path does not exist, create one..
				File::makeDirectory($path, $mode = 0777, true, true);
			}
		} catch (Exception $exception ){
			$exception->getMessage();
		}
		if (!empty($request->image)){
			//Check for current image
			$avatar = $cardDetail->image;
			$currentAvatar =  $path . '/'. $avatar; // Current avatar
			// Update the user profile table and set the profile picture
			//If profile pix already exist
			if (File::exists($currentAvatar)) {
				$photo        = $request->image;
				$fileNameExt  = $photo->getClientOriginalName(); // get filename eg 123.jpg
				$filename_new = $path . '/' . $fileNameExt;
				Image::make( $photo )->resize( 250, 205 )->save( $filename_new );

				CardDetail::where('id', '=', $cardDetail->id)->update([
					'image' => $fileNameExt,
				]);
			}else{
				//else if doesnt exist, try inserting it into database..
				$photo = $request->image;
				$fileNameExt = $photo->getClientOriginalName();
				$filename_new = $path . '/' . $fileNameExt;
				Image::make($photo)->resize(250, 205)->save($filename_new);
				CardDetail::where('id', '=', $cardDetail->id)->update([
					'image' => $fileNameExt,
				]);
			}
		}
		return redirect()->route('admin.cards')->with("message", "Card Added");
	}

	public function edit($id = "") {
		$categories = CardCategory::all();
		$edit = $id;
		$card = Card::leftJoin('card_details','cards.id','=','card_details.card_id')
				->where('cards.id','=',$id)
			->select('*','cards.id as cid','card_details.id as did','card_details')->first();
		return view('admin.cards.create', compact('card', 'edit','categories'));
		//dd($card);
	}

	public function update(Request $request, $id) {
		$rules = [
			'title' => 'required',
			'info' => 'required',
			'status' => 'required',
			'card_category' => 'required',
			'card_details' => 'required',
			'apply_link' => 'required',
			'intro_apr' => 'required',
			'regular_apr' => 'required',
			'annual_fee' => 'required|integer',
			'credit_score' => 'required|integer',
		];

		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			return Redirect()->back()->withErrors($validator);
		} else {
			// No validation error...
			// Insert data into database..
			$card = Card::where('id', $id)
			            ->update([
				            'title' => $request['title'],
				            'info' => $request['info'],
				            'status' => $request['status'],
			            ]);
			$cardDetail = CardDetail::updateOrCreate([
				'card_id'   => $id,
			],[
				'card_id' => $id,
				'card_details' => $request['card_details'],
				'apply_link' => $request['apply_link'],
				'intro_apr' => $request['intro_apr'],
				'regular_apr' => $request['regular_apr'],
				'annual_fee' => $request['annual_fee'],
				'card_category' => $request['card_category'],
				'credit_score' => $request['credit_score'],
			]);

			/*
             * First make sure the avatar directory of the current user is ready by;
             * checking if its readable ie. if it available,
             * if not create the folder
             */
			// user avatar path..
			$path = storage_path().'/app/public/images/'.$cardDetail->id;

			try{
				//check if path exists
				if(!File::exists($path)) {
					// path does not exist, create one..
					File::makeDirectory($path, $mode = 0777, true, true);
				}
			} catch (Exception $exception ){
				$exception->getMessage();
			}

			if (!empty($request->image)){
				//Check for current image
				$avatar = $cardDetail->image;
				$currentAvatar =  $path . '/'. $avatar; // Current avatar
				// Update the user profile table and set the profile picture
				//If profile pix already exist
				if (File::exists($currentAvatar)) {
					$photo        = $request->image;
					$fileNameExt  = $photo->getClientOriginalName(); // get filename eg 123.jpg
					$filename_new = $path . '/' . $fileNameExt;
					Image::make( $photo )->resize( 250, 205 )->save( $filename_new );

					CardDetail::where('id', '=', $cardDetail->id)->update([
						'image' => $fileNameExt,
					]);
				}else{
					//else if doesnt exist, try inserting it into database..
					$photo = $request->image;
					$fileNameExt = $photo->getClientOriginalName();
					$filename_new = $path . '/' . $fileNameExt;
					Image::make($photo)->resize(250, 205)->save($filename_new);
					CardDetail::where('id', '=', $cardDetail->id)->update([
						'image' => $fileNameExt,
					]);
				}
			}
			return redirect()->route('admin.cards')->with("message", "Card Updated");
		}
	}

	public function deactivate($id, Request $request) {
		$check = Card::where('id', $id)
		             ->update([
			             'status' => 'deactivated',
		             ]);
		$data = [
			'message' => 'Card Deactivated',
		];
		return $data;
		//return redirect()->route('admin.cards')->with("message", "Card Deactivated");
	}

	public function activate($id, Request $request) {
		$check = Card::where('id', $id)
		             ->update([
			             'status' => 'active',
		             ]);
		$data = [
			'message' => 'Card Activated',
		];
		return $data;
		//return redirect()->route('admin.cards')->with("message", "Card Activated");
	}

	public function destroy($id) {
		return	"You cannot delete this card.";
	}
}
