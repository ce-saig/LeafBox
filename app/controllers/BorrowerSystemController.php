<?php

class BorrowerSystemController extends BaseController{
	public function index(){
		$selectedMember = Session::get('selectedMember');
		$members = Member::orderBy('id', 'asc')->take(100)->get();
		return View::make('borrowerIndex',array('members' => $members, 'selectedMember' => $selectedMember));
	}
	public function create(){
		return View::make('borrowerCreate');
	}
	public function edit(){
		$member = Session::get('selectedMember');
		return View::make('borrowerEdit',compact('member'));
	}
	public function delete(Member $member){
		return View::make('borrowerDelete',compact('member'));
	}
	public function handleCreate(){
		$member = new Member;
		$member->name = Input::get('name');
		$member->gender = Input::get('gender');
		$member->member_status = Input::get('status');
		$member->district = Input::get('district');
		$member->address = Input::get('address');
		$member->province_postcode = Input::get('province_postcode');
		$member->phone_no = Input::get('phone_no');
		$member->save();

		return Redirect::action('BorrowerSystemController@index');

	}
	public function handleEdit(){
		$member = Member::findOrFail(Input::get('id'));
		$member->name = Input::get('name');
		$member->gender = Input::get('gender');
		$member->member_status = Input::get('status');
		$member->district = Input::get('district');
		$member->address = Input::get('address');
		$member->province_postcode = Input::get('province_postcode');
		$member->phone_no = Input::get('phone_no');
		$member->save();

		return Redirect::action('BorrowerSystemController@index');
	}
	public function handleDelete(){
		$id = Input::get('id');
		$member = Member::find($id);
		if(isset($member)) {
			$member->delete();
			return 'true';
		}
		else
			return 'false';
	}

	public function searchMember() {
		$keyword = Input::get('keyword');

		if(is_numeric($keyword)) 
			$members = Member::find((int) $keyword);
		else if(!$keyword)
			$members = Member::orderBy('id', 'asc')->take(100)->get();
		else
			$members = Member::where('name', 'LIKE', "%$keyword%")->take(5)->get();
		return json_encode($members);
	}

	public function postMember() {
		$selectedMember = Member::find(Input::get('selectedMember'));
		if(isset($selectedMember)) {
			Session::forget('selectedMember');
			Session::put('selectedMember', $selectedMember);
			return $selectedMember;
		}
		return 'no member found!!';
	}

	public function getHistory() {
		$member_id = Input::get('member_id');
		$book_name = array();
		$index = 0;
		$braille = Brailleborrow::where('member_id', '=', $member_id)->where('actual_returned', '!=', '0000-00-00 00:00:00')->get();
		$cassette = Cassetteborrow::where('member_id', '=', $member_id)->where('actual_returned', '!=', '0000-00-00 00:00:00')->get();
		$cd = Cdborrow::where('member_id', '=', $member_id)->where('actual_returned', '!=', '0000-00-00 00:00:00')->get();
		$daisy = Daisyborrow::where('member_id', '=', $member_id)->where('actual_returned', '!=', '0000-00-00 00:00:00')->get();
		$dvd = Dvdborrow::where('member_id', '=', $member_id)->where('actual_returned', '!=', '0000-00-00 00:00:00')->get();

		foreach ($braille as $key => $item) {
			$book_id = Braille::find($item->braille_id)->book_id;

			if(!isset($book_name[$book_id]))
				$book_name[$book_id] = Book::find($book_id)->title;

			$item->book_name = $book_name[$book_id];
			$item->type = "Braille";
			$item->typeID = "B" . $item->braille_id;
			$date = date_create($item->date_borrowed);
			$item->date_borrowed = date_format($date, 'd-m-Y H:i:s');
			$date = date_create($item->actual_returned);
			$item->actual_returned = date_format($date, 'd-m-Y H:i:s');
			$item->id = $index++;
		}

		foreach ($cassette as $key => $item) {
			$book_id = Cassette::find($item->cassette_id)->book_id;
			
			if(!isset($book_name[$book_id]))
				$book_name[$book_id] = Book::find($book_id)->title;

			$item->book_name = $book_name[$book_id];
			$item->type = "Cassette";
			$item->typeID = "C" . $item->cassette_id;
			$date = date_create($item->date_borrowed);
			$item->date_borrowed = date_format($date, 'd-m-Y H:i:s');
			$date = date_create($item->actual_returned);
			$item->actual_returned = date_format($date, 'd-m-Y H:i:s');
			$item->id = $index++;
		}

		foreach ($cd as $key => $item) {
			$book_id = CD::find($item->cd_id)->book_id;
			
			if(!isset($book_name[$book_id]))
				$book_name[$book_id] = Book::find($book_id)->title;

			$item->book_name = $book_name[$book_id];
			$item->type = "CD";
			$item->typeID = "CD" . $item->cd_id;
			$date = date_create($item->date_borrowed);
			$item->date_borrowed = date_format($date, 'd-m-Y H:i:s');
			$date = date_create($item->actual_returned);
			$item->actual_returned = date_format($date, 'd-m-Y H:i:s');
			$item->id = $index++;
		}

		foreach ($daisy as $key => $item) {
			$book_id = Daisy::find($item->daisy_id)->book_id;
			
			if(!isset($book_name[$book_id]))
				$book_name[$book_id] = Book::find($book_id)->title;

			$item->book_name = $book_name[$book_id];
			$item->type = "Daisy";
			$item->typeID = "D" . $item->daisy_id;
			$date = date_create($item->date_borrowed);
			$item->date_borrowed = date_format($date, 'd-m-Y H:i:s');
			$date = date_create($item->actual_returned);
			$item->actual_returned = date_format($date, 'd-m-Y H:i:s');
			$item->id = $index++;
		}

		foreach ($dvd as $key => $item) {
			$book_id = DVD::find($item->dvd_id)->book_id;
			
			if(!isset($book_name[$book_id]))
				$book_name[$book_id] = Book::find($book_id)->title;

			$item->book_name = $book_name[$book_id];
			$item->type = "DVD";
			$item->typeID = "DVD" . $item->dvd_id;
			$date = date_create($item->actual_returned);
			$item->date_borrowed = date_format($date, 'd-m-Y H:i:s');
			$date = date_create($item->actual_returned);
			$item->actual_returned = date_format($date, 'd-m-Y H:i:s');
			$item->id = $index++;
		}

		$all_collection = $braille->merge($cassette->merge($cd->merge($daisy->merge($dvd))));
		$all_collection = $all_collection->sortBy(function($media) {
			return $media->date_borrowed;
		});

		$index = 0;
		$list = array();
		foreach ($all_collection as $key => $item)
			$list[$index++] = $item;

		return json_encode($list);
	}

	public function getNonReturnList() {
		$member_id = Input::get('member_id');
		$book_name = array();
		$index = 0;
		$braille = Brailleborrow::where('member_id', '=', $member_id)->where('actual_returned', '=', '0000-00-00 00:00:00')->get();
		$cassette = Cassetteborrow::where('member_id', '=', $member_id)->where('actual_returned', '=', '0000-00-00 00:00:00')->get();
		$cd = Cdborrow::where('member_id', '=', $member_id)->where('actual_returned', '=', '0000-00-00 00:00:00')->get();
		$daisy = Daisyborrow::where('member_id', '=', $member_id)->where('actual_returned', '=', '0000-00-00 00:00:00')->get();
		$dvd = Dvdborrow::where('member_id', '=', $member_id)->where('actual_returned', '=', '0000-00-00 00:00:00')->get();

		foreach ($braille as $key => $item) {
			$book_id = Braille::find($item->braille_id)->book_id;

			if(!isset($book_name[$book_id]))
				$book_name[$book_id] = Book::find($book_id)->title;

			$item->book_name = $book_name[$book_id];
			$item->type = "Braille";
			$item->typeID = "B" . $item->braille_id;
			$date = date_create($item->date_borrowed);
			$item->date_borrowed = date_format($date, 'd-m-Y H:i:s');
			$date = date_create($item->date_returned);
			$item->date_returned = date_format($date, 'd-m-Y H:i:s');
			$item->id = $index++;
		}

		foreach ($cassette as $key => $item) {
			$book_id = Cassette::find($item->cassette_id)->book_id;
			
			if(!isset($book_name[$book_id]))
				$book_name[$book_id] = Book::find($book_id)->title;

			$item->book_name = $book_name[$book_id];
			$item->type = "Cassette";
			$item->typeID = "C" . $item->cassette_id;
			$date = date_create($item->date_borrowed);
			$item->date_borrowed = date_format($date, 'd-m-Y H:i:s');
			$date = date_create($item->date_returned);
			$item->date_returned = date_format($date, 'd-m-Y H:i:s');
			$item->id = $index++;
		}

		foreach ($cd as $key => $item) {
			$book_id = CD::find($item->cd_id)->book_id;
			
			if(!isset($book_name[$book_id]))
				$book_name[$book_id] = Book::find($book_id)->title;

			$item->book_name = $book_name[$book_id];
			$item->type = "CD";
			$item->typeID = "CD" . $item->cd_id;
			$date = date_create($item->date_borrowed);
			$item->date_borrowed = date_format($date, 'd-m-Y H:i:s');
			$date = date_create($item->date_returned);
			$item->date_returned = date_format($date, 'd-m-Y H:i:s');
			$item->id = $index++;
		}

		foreach ($daisy as $key => $item) {
			$book_id = Daisy::find($item->daisy_id)->book_id;
			
			if(!isset($book_name[$book_id]))
				$book_name[$book_id] = Book::find($book_id)->title;

			$item->book_name = $book_name[$book_id];
			$item->type = "Daisy";
			$item->typeID = "D" . $item->daisy_id;
			$date = date_create($item->date_borrowed);
			$item->date_borrowed = date_format($date, 'd-m-Y H:i:s');
			$date = date_create($item->date_returned);
			$item->date_returned = date_format($date, 'd-m-Y H:i:s');
			$item->id = $index++;
		}

		foreach ($dvd as $key => $item) {
			$book_id = DVD::find($item->dvd_id)->book_id;
			
			if(!isset($book_name[$book_id]))
				$book_name[$book_id] = Book::find($book_id)->title;

			$item->book_name = $book_name[$book_id];
			$item->type = "DVD";
			$item->typeID = "DVD" . $item->dvd_id;
			$date = date_create($item->actual_returned);
			$item->date_borrowed = date_format($date, 'd-m-Y H:i:s');
			$date = date_create($item->date_returned);
			$item->date_returned = date_format($date, 'd-m-Y H:i:s');
			$item->id = $index++;
		}

		$all_collection = $braille->merge($cassette->merge($cd->merge($daisy->merge($dvd))));
		$all_collection = $all_collection->sortBy(function($media) {
			return $media->date_borrowed;
		});

		$index = 0;
		$list = array();
		foreach ($all_collection as $key => $item)
			$list[$index++] = $item;

		return json_encode($list);
	}
}