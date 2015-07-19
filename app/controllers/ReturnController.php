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
    return View::make('return',array('list' => $returnList, 'member' => $member));
  }

  //get list
  public function getList()
  {
//    Session::get()
  }

  // Select member from ID/name - Use same func as Borrowed

  public function deleteSelectedMedia($mediaId)
  {
    $selectedList = Session::get('list', array());
    $isHas=array_key_exists(strval($mediaId),$selectedList);
    $status=false;
    if($isHas){
      $status=true;
      unset($selectedList[$mediaId]);
    }else{
      $status=false;
    }
    Session::put('list', $selectedList);
    return Response::json(array('status' => $status));
  }

  //TODO : Title,Type and get real item
  //post Media id and add it to list
  public function postAdd()
  {

    $mid = Input::get('mid');
    $member = Session::get('member');
    $media_id = preg_replace("/[^0-9]/", "", $mid);
    $media = preg_replace("/[0-9]/", "", $mid);
    $media_abbr = null;

    $item=null;
    $last_item = null;
    $is_id_valid = false;
    if (in_array($media, array("dvd", "Dvd", "DvD", "dVd", "dVD", "dvD", "DVd", "DVD"))) {
      $media="DVD";
      $media_abbr = "DVD";
      $item  = DVD::find((int)$media_id);
      $last_item = Dvdborrow::where('dvd_id', '=', $media_id)->orderBy('id', 'desc')->first();
      $is_id_valid = (isset($item)) ? ($last_item->dvd_id == $media_id) : false;
    }else if (in_array($media, array("cd", "Cd", "cD", "CD"))) {
      $media="CD";  
      $media_abbr = "CD";    
      $item  = CD::find((int)$media_id);
      $last_item = Cdborrow::where('cd_id', '=', $media_id)->orderBy('id', 'desc')->first();
      $is_id_valid = (isset($item)) ? ($last_item->cd_id == $media_id) : false;
    }else if (in_array($media, array('d', 'D'))) {
      $media="Daisy"; 
      $media_abbr = "D";   
      $item  = Daisy::find((int)$media_id);
      $last_item = Daisyborrow::where('daisy_id', '=', $media_id)->orderBy('id', 'desc')->first();
      $is_id_valid = (isset($item)) ? ($last_item->daisy_id == $media_id) : false;
    }else if (in_array($media, array('c', 'C'))) {
      $media="Cassette";
      $media_abbr = "C";      
      $item  = Cassette::find((int)$media_id);
      $last_item = Cassetteborrow::where('cassette_id', '=', $media_id)->orderBy('id', 'desc')->first();
      $is_id_valid = (isset($item)) ? ($last_item->cassette_id == $media_id) : false;
    }else if (in_array($media, array('b', 'B'))) {
      $media="Braille";
      $media_abbr = "B";  
      $item  = Braille::find((int)$media_id);
      $last_item = Brailleborrow::where('braille_id', '=', $media_id)->orderBy('id', 'desc')->first();
      $is_id_valid = (isset($item)) ? ($last_item->braille_id == $media_id) : false;
    }

    if(!(((int)$item['book_id'])>0) || !$item['reserved'] || $last_item->member_id != $member->id || !$is_id_valid )
      return Response::json(array('status'=>'not found'));

    $book = Book::find($item['book_id']);
    
    $returnList = Session::get('list', array());
    $media_id = str_pad($media_id, 3, "0", STR_PAD_LEFT);
    $isHas=array_key_exists(strval($media_abbr . $media_id),$returnList);
    $status="not found";

    $list['no']=count($returnList)+1;
    $list['title']=$book['title'];
    $list['id']= $media_abbr . $media_id; //$media_id
    $list['item']=$item;
    $list['type']=$media;
    $list['date_borrowed'] = date_format(date_create($last_item->date_borrowed), 'd-m-Y H:i:s');

    if($isHas){
      $status = "duplicated";
    }else{
      $returnList[$list['id']]=$list;
      Session::put('list', $returnList);
      $status="success";
    }
    return Response::json(array('status'=>$status,'media'=>$list));
  }

  //Submit
  public function postSubmitReturn()
  {
    $returnList = Session::get('list', array());
    $dateReturned = date("Y-m-d H:i:s");
    foreach ($returnList as $item) {
      $media_id = preg_replace("/[^0-9]/", "", $item['id']);
      $media = preg_replace("/[0-9]/", "", $item['id']);
      $temp_media = null;
      $borrowed_rec = null;

      if($media == "DVD") {
        $temp_media = DVD::find($media_id);
        $borrowed_rec = Dvdborrow::where('dvd_id', '=', $media_id)->orderBy('id', 'desc')->first();
      }
      else if($media == "CD") {
        $temp_media = CD::find($media_id);
        $borrowed_rec = Cdborrow::where('cd_id', '=', $media_id)->orderBy('id', 'desc')->first();
      }
      if($media == "D") {
        $temp_media = Daisy::find($media_id);
        $borrowed_rec = Daisyborrow::where('daisy_id', '=', $media_id)->orderBy('id', 'desc')->first();
      }
      if($media == "C") {
        $temp_media = Cassette::find($media_id);
        $borrowed_rec = Cassetteborrow::where('cassette_id', '=', $media_id)->orderBy('id', 'desc')->first();
      }
      else if($media == "B") {
        $temp_media = Braille::find($media_id);
        $borrowed_rec = Brailleborrow::where('braille_id', '=', $media_id)->orderBy('id', 'desc')->first();
      }
      else
        return Response::json(array('status'=>'not found'));

      $temp_media->reserved = 0;
      $temp_media->save();

      $borrowed_rec->date_returned = $dateReturned;
      $borrowed_rec->save();
    }

    Session::forget(array('list', 'member'));
    return "completed";
  }

  //Clear
  public function getClear()
  {
    $member = Session::get('member',"-");
    //Session::forget('member');
    Session::forget(array('list', 'member'));
    return $member;
  }

  public function getMember($key)
  {
    $member = Member::find($key);
    Session::put('member', $member);
    return $member;
  }

  public function postMember()
  {
    //TODO : find by NAME or ID
    $member = Input::get('member');//
    $memberTemp = Member::where('name', 'like', '%'.$member.'%')->orWhere('id', 'like', '%'.$member.'%')->get();

    return  $memberTemp;
  }
}

