<?php

/*
$userId : of user that do action
$memberId : of borrower
$selectedList : array of selected media's object
*/


class BorrowController extends BaseController {

  public function index()
  {
    $selectedList = Session::get('sel', array());
    return View::make('borrow',array('sel',$selectedList));
  }

  /*
  * Return list of book that going to borrow
  */
  public function getSelectedBookList()
  {
    # code...
  }

  /* When user click on book (media) item list
  *  add it to book selected list
  */
  public function postSelectBook($mediaId)
  {

    // DVD  // CD  // D  // C  // B
    $type="Braille";
    $id=$mediaId;
    $mediaType=$mediaId;
    preg_replace("/[0-9]/", "", $mediaType);
    preg_replace("/[^0-9]/", "", $id);
    if(strpos($mediaId, "DVD")!==false){
      $type="D";
    }else if(strpos($mediaId, "CD")!==false){
      $type="CD";
    }else if(strpos($mediaId, "D")!==false){
      $type="D";
    }else if(strpos($mediaId, "C")!==false){
      $type="C";
    }else{ //braile
      $type="B";
    }

    // $media = findBy MediaID

    $selectedList = Session::get('sel', array());

    $isHas=array_key_exists(strval($mediaId),$selectedList);
    $status=false;
    if($isHas){
      // Tell This media is already add to list and does nothing.
      $status=false;
    }else{
      $media['type']=$mediaType;
      $media['id']=$id;
      $media['title']="TITLE"; //TODO get real name
      //$media['----'];
      $selectedList[$mediaId]=$media;
      Session::put('sel', $selectedList);
      $status=true;
    }
    return Response::json(array('status' => $status,'list'=>$selectedList));
  }


  /*
  * When User click on item of Member's list
  * Get Member of memberId and add to to borrower
  */
  public function getMember($key)
  {
    return $key;
  }

  //TODO : Nut do this pls
  /*
  * Search for member
  * - by Member's id
  * - by Member's name
  * return Array of Member's Object if member existed
  *        null if member didnt existed
  */
  public function postMember()
  {
    //TODO : find by NAME or ID
    $memberTemp = Member::all();

    return  $memberTemp;
  }

  /*
  * Save list of borrowed book
  */
  public function postSubmitSelectedList($userId,$memberId,$selectedList)
  {
    # code...
  }

  public function getClear()
  {
    Session::forget('sel');
  }


  public function getSearch()
  {
    $result = array();
    $keyword = Input::get('keyword');
    //if user search from book's title
    $books = Book::where('title', 'LIKE', "%$keyword%")->get();
    //return $books;
    foreach($books as $book){
      //find braille associate this book
      //then add to result if exist
      array_push($result, array_fill_keys(array('title'),$book->title));
      array_push($result[sizeof($result)-1], array());
      //return $result;
      $brailles = $book->braille()->get();
      //return sizeof($brailles);
      if($brailles){
        foreach($brailles as $braille){
          $braille->id = 'B'.str_pad($braille->id, 3, '0', STR_PAD_LEFT);
          array_push($result[sizeof($result)-1][0], $braille);
        }
      }

      $cassettes = $book->cassette()->get();
      array_push($result[sizeof($result)-1], array());
      //return sizeof($cassette);
      if($cassettes){
        foreach($cassettes as $cassette){
          $cassette->id = 'C'.str_pad($cassette->id, 3, '0', STR_PAD_LEFT);
          array_push($result[sizeof($result)-1][1], $cassette);
        }
      }

      $cds = $book->cd()->get();
      array_push($result[sizeof($result)-1], array());
      if($cds){
        foreach($cds as $cd){
          $cd->id = 'CD'.str_pad($cd->id, 3, '0', STR_PAD_LEFT);
          array_push($result[sizeof($result)-1][2], $cd);
        }
      }

      $daisies = $book->daisy()->get();
      array_push($result[sizeof($result)-1], array());
      if($daisies){
        foreach($daisies as $daisy){
          $daisy->id = 'D'.str_pad($daisy->id, 3, '0', STR_PAD_LEFT);
          array_push($result[sizeof($result)-1][3], $daisy);
        }
      }

      $dvds = $book->dvd()->get();
      array_push($result[sizeof($result)-1], array());
      if($dvds){
        foreach($dvds as $dvd){
          $dvd->id = 'DVD'.str_pad($dvd->id, 3, '0', STR_PAD_LEFT);
          array_push($result[sizeof($result)-1][4], $dvd);
        }
      }
    }
    //return (!$book)?'true':'false';
    if(!$result){
      return '';
    } else {
      return json_encode($result);
    }

  }
}

