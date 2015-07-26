<?php

class BorrowerSystemController extends BaseController{
	public function index(){
		$members = Member::all();
		return View::make('borrowerIndex',compact('members'));
	}
	public function create(){
		return View::make('borrowerCreate');
	}
	public function edit(Member $member){
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
		$member = Member::findOrFail($id);
		$member->delete();

		return Redirect::action('BorrowerSystemController@index');
	}
}