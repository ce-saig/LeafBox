<?php

/*
$userId : of user that do action
$memberId : of borrower
$selectedList : array of selected media's object
*/

class ReturnController extends BaseController {
  public function getIndex()
  {

    //Session::put('member', $member);
    //Session::get('member', $member);
    return View::make('return');
  }

  //get list
  public function getList()
  {
    # code...
  }

  // Select member from ID/name - Use same func as Borrowed

  //post Media id and add it to list
  public function postAddMedia()
  {
    # code...
  }

  //Submit
  public function postSubmitReturn()
  {
    # code...
  }

  //Clear
  public function getClear()
  {
    Session::forget('member', $member);
    Session::forget('return', $member);
  }

}

