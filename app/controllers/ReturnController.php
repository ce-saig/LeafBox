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
    $book_id = null;
    $part = 0;
    if($isHas){
      $status=true;
      $book_id = $selectedList[$mediaId]['book_id'];
      $part = $selectedList[$mediaId]['part'];
      unset($selectedList[$mediaId]);
    }else{
      $status=false;
    }
    Session::put('list', $selectedList);
    return Response::json(array('status' => $status, 'book_id' => $book_id, 'part' => $part));
  }

  //TODO : Title,Type and get real item
  //post Media id and add it to list
  public function postAdd()
  {
    $mid = Input::get('mid');
    $member = Session::get('member');
    $media_id = preg_replace("/[^0-9]/", "", $mid);
    $media = strtoupper(preg_replace("/[0-9]/", "", $mid));
    $media_abbr = null;

    $item=null;
    $last_item = null;
    $is_id_valid = false;
    
    if ($media == "DVD") {
      $media_abbr = $media;
      $item  = DVD::find((int)$media_id);
      if (isset($item) && $item->reserved) {
        $last_item = Dvdborrow::where('dvd_id', '=', $media_id)->orderBy('id', 'desc')->first();
        $is_id_valid = (isset($item, $last_item)) ? ($last_item->dvd_id == $media_id) : false;
      }

    }else if ($media == "CD") { 
      $media_abbr = $media;    
      $item  = CD::find((int)$media_id);
      if (isset($item) && $item->reserved) {
        $last_item = Cdborrow::where('cd_id', '=', $media_id)->orderBy('id', 'desc')->first();
        $is_id_valid = (isset($item, $last_item)) ? ($last_item->cd_id == $media_id) : false;
      }
    }else if ($media == 'D') {
      $media="Daisy"; 
      $media_abbr = "D";   
      $item  = Daisy::find((int)$media_id);
      if (isset($item) && $item->reserved) {
        $last_item = Daisyborrow::where('daisy_id', '=', $media_id)->orderBy('id', 'desc')->first();
        $is_id_valid = (isset($item, $last_item)) ? ($last_item->daisy_id == $media_id) : false;
      }
    }else if ($media == 'C') {
      $media="Cassette";
      $media_abbr = "C";      
      $item  = Cassette::find((int)$media_id);
      if (isset($item) && $item->reserved) {
        $last_item = Cassetteborrow::where('cassette_id', '=', $media_id)->orderBy('id', 'desc')->first();
        $is_id_valid = (isset($item, $last_item)) ? ($last_item->cassette_id == $media_id) : false;
      }
    }else if ($media == 'B') {
      $media="Braille";
      $media_abbr = "B";  
      $item  = Braille::find((int)$media_id);
      if (isset($item) && $item->reserved) {
        $last_item = Brailleborrow::where('braille_id', '=', $media_id)->orderBy('id', 'desc')->first();
        $is_id_valid = (isset($item, $last_item)) ? ($last_item->braille_id == $media_id) : false;
      }
    }



    if(!$item || !(((int)$item['book_id'])>0) || !$item['reserved'] || $last_item->member_id != $member->id || !$is_id_valid )
      return Response::json(array('status'=>'not found'));

    $book = Book::find($item['book_id']);
    
    $returnList = Session::get('list', array());
    $isHas=array_key_exists(strval($media_abbr . $media_id),$returnList);
    $status="not found";

    $borrow_date = date_create($last_item->date_borrowed);
    $due_date = date_create($last_item->date_returned);

    $list['no']=count($returnList)+1;
    $list['title']=$book['title'];
    $list['id']= $media_abbr . $media_id; //$media_id
    $list['item']=$item;
    $list['type']=$media;
    $list['book_id'] = $item['book_id'];

    if($media == "Braille")
      $list['part'] = 1;
    else
      $list['part'] = (int) $item['numpart'];

    $list['date_borrowed'] = date_format($borrow_date, 'd-m-').(date_format($borrow_date, 'Y') + 543);
    $list['due_date'] = date_format($due_date, 'd-m-').(date_format($due_date, 'Y') + 543);

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
      else if($media == "D") {
        $temp_media = Daisy::find($media_id);
        $borrowed_rec = Daisyborrow::where('daisy_id', '=', $media_id)->orderBy('id', 'desc')->first();
      }
      else if($media == "C") {
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

      $borrowed_rec->actual_returned = $dateReturned;
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
    $memberTemp = Member::where('name', 'like', '%'.$member.'%')->orWhere('id', 'like', '%'.$member.'%')->take(25)->get();

    return  $memberTemp;
  }
}

