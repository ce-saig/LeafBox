<?php

class BorrowerSystemController extends BaseController{
	public function index(){
		$selectedMember = Session::get('selectedMember');
		$members = Member::all();
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
}