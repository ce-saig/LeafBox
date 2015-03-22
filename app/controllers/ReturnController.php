<?php

/*
$userId : of user that do action
$memberId : of borrower
$selectedList : array of selected media's object
*/

class ReturnController extends BaseController {
  // Should not return list of unborrow item
  
  public function getIndex()
  {

    $returnList = Session::get('list', array());
    $member = Session::get('member');
    return View::make('return',array('list' => $returnList));
  }

  //get list
  public function getList()
  {
//    Session::get()
  }

  // Select member from ID/name - Use same func as Borrowed




  //TODO : Title,Type and get real item
  //post Media id and add it to list
  public function postAdd()
  {

    $mid = Input::get('mid');
    $media_id = preg_replace("/[^0-9]/", "", $mid);
    $media = preg_replace("/[0-9]/", "", $mid);

    $item=null;
    if ($media=="DVD") {
      $media="DVD";
      $item  = DVD::find((int)$media_id);
    }else if ($media=="CD") {
      $media="CD";      
      $item  = CD::find((int)$media_id);
    }else if ($media=="D") {
      $media="Daisy";      
      $item  = Daisy::find((int)$media_id);
    }else if ($media=="C") {
      $media="Cassette";      
      $item  = Cassette::find((int)$media_id);
    }else if ($media=="B") {
      $media="Braille";   
      $item  = Braille::find((int)$media_id);
    }

    if(!(((int)$item['book_id'])>0))
      return Response::json(array('status'=>false));

    $book = Book::find($item['book_id']);
    
    $returnList = Session::get('list', array());
    $isHas=array_key_exists(strval($mid),$returnList);
    $status=false;

    $list['no']=count($returnList)+1;
    $list['title']=$book['title'];
    $list['id']=$mid; //$media_id
    $list['item']=$item;
    $list['type']=$media;

    if($isHas){
    }else{
      $returnList[$mid]=$list;
      Session::put('list', $returnList);
      $status=true;
    }

    return Response::json(array('status'=>$status,'media'=>$list));
  }

  //Submit
  public function postSubmitReturn()
  {
    # code...
  }

  //Clear
  public function getClear()
  {
    $member = Session::get('member',"-");
    //Session::forget('member');
    Session::forget('list');
    return $member;
  }

}

