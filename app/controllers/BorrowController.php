<?php

/*
$userId : of user that do action
$memberId : of borrower
$selectedList : array of selected media's object
*/

//--------------------- TODO : Return book ----------//
class BorrowController extends BaseController {

  public function index()
  {
    $selectedList = Session::get('borrow', array());
    $member = Session::get('member');
    return View::make('borrow',array('borrow'=>$selectedList, 'member'=>$member));
  }

  /*
  * Return list of book that going to borrow
  */
  public function getSelectedBookList()
  {
    $selectedList = Session::get('borrow', array());
    return Response::json(array('status' => true,'media'=>($selectedList)));
  }


  //TODO : Check is that media can borrow? is someone borrowed it
  /* When user click on book (media) item list
  *  add it to book selected list
  */
  public function postSelectBook($mediaId)
  {

    // DVD  // CD  // D  // C  // B
    $type="Braille";
    $id=$mediaId;
    $mediaType=$mediaId;
    $mediaTypeID= null;
    //preg_replace("/[0-9]/", "", $mediaType);
    $id = preg_replace("/[^0-9]/", "", $id);

    if(strpos($mediaType, "DVD")!==false){
      $item = DVD::find((int)$id);
      $mediaType="DVD";
    }else if(strpos($mediaType, "CD")!==false){
      $item = CD::find((int)$id);
      $mediaType="CD";
    }else if(strpos($mediaType, "D")!==false){
      $item = Daisy::find((int)$id);
      $mediaType="Daisy";
    }else if(strpos($mediaType, "C")!==false){
      $item = Cassette::find((int)$id);
      $mediaType="Cassette";
    }else{ //braile
      $item = Braille::find((int)$id);
      $mediaType="Braille";
    }

    // $media = findBy MediaID
    $selectedList = Session::get('borrow', array());
    $isHas=array_key_exists(strval($mediaId),$selectedList);
    $status=false;
    if($isHas){
      // Tell This media is already add to list and does nothing.
      $status=false;
    }else{
      $book = Book::find($item['book_id']);
      $media['no']=count($selectedList)+1;
      $media['type']=$mediaType;
      $media['id']=(int)$id;
      $media['book_id'] = $item['book_id'];

      if($mediaType == "Braille")
        $media['part'] = 1;
      else
        $media['part'] = (int) $item['numpart'];

      $media['title']=$book['title'];
      $media['typeID'] = $mediaId;
      //$media['----'];
      $selectedList[$mediaId]=$media;
      Session::put('borrow', $selectedList);
      $status=true;
    }

    return Response::json(array('status' => $status,'media'=>end($selectedList)));
  }

  public function deleteSelectedMedia($mediaId)
  {
    $selectedList = Session::get('borrow', array());
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
    Session::put('borrow', $selectedList);
    return Response::json(array('status' => $status, 'book_id' => $book_id, 'part' => $part));
  }


  /*
  * When User click on item of Member's list
  * Get Member of memberId and add to to borrower
  */
  public function getMember($key)
  {
    $member = Member::find($key);
    Session::put('member', $member);
    return $member;
  }

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
    $member = Input::get('member');//
    $memberTemp = Member::where('name', 'like', '%'.$member.'%')->orWhere('id', 'like', '%'.$member.'%')->take(25)->get();

    return  $memberTemp;
  }


//TODO : Check is that media can borrow? is someone borrowed it
  /*
  * Save list of borrowed book
  */
  //$userId,$memberId,$selectedList
  public function postSubmitSelectedList()
  {
    $selectedList = Session::get('borrow', array());

    //member_id
    $member_id = Session::get('member')->id;
    //cassette_id

    //date_borrowed
    
    $dateBorrow = (date("Y") + 543).date("-m-d H:i:s");
    //date_returned
    //TODO What return date should kept? today+borrow time/specific return date
    $dateTmp = date_create_from_format('d/m/Y', Session::get('retdate', date("d/m/Y",strtotime(' +15 day'))));
    $dateReturn = date_format($dateTmp, 'Y-m-d H:i:s');

    //LOOP insert media into it tb
    foreach ($selectedList as $item) {
      // Mark as reserved
      if($item['type']=="DVD"){
        $d = DVD::find($item['id']);
        $d['reserved']=true;
        $d->save();

        $dvd = new Dvdborrow;
        $dvd['dvd_id'] = $item['id'];
        $dvd['date_borrowed'] = $dateBorrow;
        $dvd['date_returned'] = $dateReturn;
        $dvd['member_id']=$member_id;
        $dvd->save();
      }else if($item['type']=="CD"){
        $d = CD::find($item['id']);
        $d['reserved']=true;
        $d->save();

        $cd = new Cdborrow;
        $cd['cd_id'] = $item['id'];
        $cd['date_borrowed'] = $dateBorrow;
        $cd['date_returned'] = $dateReturn;
        $cd['member_id']=$member_id;
        $cd->save();

      }else if($item['type']=="Daisy"){
        $d = Daisy::find($item['id']);
        $d['reserved']=true;
        $d->save();

        $daisy = new Daisyborrow;
        $daisy['daisy_id'] = $item['id'];
        $daisy['date_borrowed'] = $dateBorrow;
        $daisy['date_returned'] = $dateReturn;
        $daisy['member_id']=$member_id;
        $daisy->save();

      }else if($item['type']=="Cassette"){
        $d = Cassette::find($item['id']);
        $d['reserved']=true;
        $d->save();

        $cs = new Cassetteborrow;
        $cs['cassette_id'] = $item['id'];
        $cs['date_borrowed'] = $dateBorrow;
        $cs['date_returned'] = $dateReturn;
        $cs['member_id']=$member_id;
        $cs->save();

      }else if($item['type']=="Braille"){// if Braille
        $d = Braille::find($item['id']);
        $d['reserved']=true;
        $d->save();

        $braille = new Brailleborrow;
        $braille['braille_id'] = $item['id'];
        $braille['date_borrowed'] = $dateBorrow;
        $braille['date_returned'] = $dateReturn;
        $braille['member_id']=$member_id;
        $braille->save();
      }
    }

    Session::forget(array('borrow', 'member'));
    return "completed";
    //return ($selectedList);
  }

  public function getClear()
  {
    Session::forget(array('borrow', 'member'));
    return Session::get('member', array());
  }

  public function postRetDate()
  {
    $retdate=Input::get('retdate');
    Session::put('retdate', $retdate);
    return $retdate;
  }

  //TODO Search from "ID" only not Book title
  //Limit number of search result number
  public function getSearch()
  {
    $result = array();
    $keyword = Input::get('keyword');

    $media_id = preg_replace("/[^0-9]/", "", $keyword);
    $media = strtoupper(preg_replace("/[0-9]/", "", $keyword));

    $dvd_condition  = ($media == "DVD") && is_numeric($media_id);
    $cd_condition   = ($media == "CD") && is_numeric($media_id);
    $bcd_condition  = in_array($media, array('B', 'C', 'D')) && is_numeric($media_id);

    //$result = $this->searchByName($keyword);
    if(is_numeric($keyword))
      $result = $this->searchByID($keyword, 1);
    else if($dvd_condition || $cd_condition || $bcd_condition)
      $result = $this->searchByID($keyword, 2);
    else
      $result = $this->searchByName($keyword);

    $selectedList = Session::get('borrow', array());

    if(!$result)
      return '';
    else
      return json_encode($result);
  }

  public function searchByName($keyword)
  {
    $result = array();
    //if user search from book's title
    $books = Book::where('title', 'LIKE', "%$keyword%")->take(5)->get();
    //return $books;
    foreach($books as $book){
      //find braille associate this book
      //then add to result if exist
      array_push($result, array_fill_keys(array('title'),$book->title));
      array_push($result[sizeof($result)-1], array());
      //return $result;
      $brailles = $book->braille()->take(5)->get(); // TODO Limit
      //return sizeof($brailles);
      if($brailles){
        foreach($brailles as $braille){
          if(!$braille->reserved) {
            $braille->id = 'B'.$braille->id;
            array_push($result[sizeof($result)-1][0], $braille);
          }
        }
      }

      $cassettes = $book->cassette()->take(5)->get();
      array_push($result[sizeof($result)-1], array());
      //return sizeof($cassette);
      if($cassettes){
        foreach($cassettes as $cassette){
          if(!$cassette->reserved) {
            $cassette->id = 'C'.$cassette->id;
            array_push($result[sizeof($result)-1][1], $cassette);
          }
        }
      }

      $cds = $book->cd()->take(5)->get();
      array_push($result[sizeof($result)-1], array());
      if($cds){
        foreach($cds as $cd){
          if(!$cd->reserved){
            $cd->id = 'CD'.$cd->id;
            array_push($result[sizeof($result)-1][2], $cd);
          }
        }
      }

      $daisies = $book->daisy()->take(5)->get();
      array_push($result[sizeof($result)-1], array());
      if($daisies){
        foreach($daisies as $daisy){
          if(!$daisy->reserved) {
            $daisy->id = 'D'.$daisy->id;
            array_push($result[sizeof($result)-1][3], $daisy);
          }
        }
      }

      $dvds = $book->dvd()->take(5)->get();
      array_push($result[sizeof($result)-1], array());
      if($dvds){
        foreach($dvds as $dvd){
          if(!$dvd->reserved) {
            $dvd->id = 'DVD'.$dvd->id;
            array_push($result[sizeof($result)-1][4], $dvd);
          }
        }
      }
    }
    return $result;
  }

  public function searchByID($keyword, $search_type) //type 1 : number only, type 2 : number with media
  {
    
    $found_status = array(array()); //(braille, casette, cd, daisy, dvd) *media status of each book
    $result = array();
    $books  = array();
    $book_index = 0;
    if($search_type == 1) {
      $keyword = (int) $keyword;
      $braille = Braille::find($keyword);
      if($braille != null) {
        $books[$book_index] = Book::find($braille->book_id);
        $found_status[$book_index++] = array(1, 0, 0, 0, 0);
      }

      $cassette = Cassette::find($keyword);
      if($cassette != null) {
        $books[$book_index] = Book::find($cassette->book_id);
        $found_status[$book_index++] = array(0, 1, 0, 0, 0);
      }

      $cd = CD::find($keyword);
      if($cd != null) {
        $books[$book_index] = Book::find($cd->book_id);
        $found_status[$book_index++] = array(0, 0, 1, 0, 0);
      }

      $daisy = Daisy::find($keyword);
      if($daisy != null) {
        $books[$book_index] = Book::find($daisy->book_id);
        $found_status[$book_index++] = array(0, 0, 0, 1, 0);
      }

      $dvd = DVD::find($keyword);
      if($dvd != null) {
        $books[$book_index] = Book::find($dvd->book_id);
        $found_status[$book_index++] = array(0, 0, 0, 0, 1);
      }
    }
    else {
      $media_id = (int) preg_replace("/[^0-9]/", "", $keyword);
      $media = strtoupper(preg_replace("/[0-9]/", "", $keyword));

      switch ($media) {
        case 'B' :
        $braille = Braille::find($media_id);
        if(!isset($braille))
          return;
        $books[0] = Book::find($braille->book_id);
        $found_status[0] = array(1, 0, 0, 0, 0);
        break;
        case 'C' :
        $cassette = Cassette::find($media_id);
        if(!isset($cassette))
          return;
        $books[0] = Book::find($cassette->book_id);
        $found_status[0] = array(0, 1, 0, 0, 0);
        break;
        case 'CD' :
        $cd = CD::find($media_id);
        if(!isset($cd))
          return;
        $books[0] = Book::find($cd->book_id);
        $found_status[0] = array(0, 0, 1, 0, 0);
        break;
        case 'D' :
        $daisy = Daisy::find($media_id);
        if(!isset($daisy))
          return;
        $books[0] = Book::find($daisy->book_id);
        $found_status[0] = array(0, 0, 0, 1, 0);
        break;
        case 'DVD' :
        $dvd = DVD::find($media_id);
        if(!isset($dvd))
          return;
        $books[0] = Book::find($dvd->book_id);
        $found_status[0] = array(0, 0, 0, 0, 1);
        break;
      }
    }


    $book_index = 0;
    foreach($books as $book){
      //find braille associate this book
      //then add to result if exist
      array_push($result, array_fill_keys(array('title'),$book->title));
      array_push($result[sizeof($result)-1], array());
      //return $result;
      $brailles = $book->braille()->get(); // TODO Limit
      //return sizeof($brailles);
      if($brailles){
        foreach($brailles as $braille){
          if(!$braille->reserved && $found_status[$book_index][0]) {
            $braille->id = 'B'.$braille->id;
            array_push($result[sizeof($result)-1][0], $braille);
          }
        }
      }

      $cassettes = $book->cassette()->get();
      array_push($result[sizeof($result)-1], array());
      //return sizeof($cassette);
      if($cassettes){
        foreach($cassettes as $cassette){
          if(!$cassette->reserved && $found_status[$book_index][1]) {
            $cassette->id = 'C'.$cassette->id;
            array_push($result[sizeof($result)-1][1], $cassette);
          }
        }
      }

      $cds = $book->cd()->get();
      array_push($result[sizeof($result)-1], array());
      if($cds){
        foreach($cds as $cd){
          if($cd && !$cd->reserved && $found_status[$book_index][2]){
            $cd->id = 'CD'.$cd->id;
            array_push($result[sizeof($result)-1][2], $cd);
          }
        }
      }

      $daisies = $book->daisy()->get();
      array_push($result[sizeof($result)-1], array());
      if($daisies){
        foreach($daisies as $daisy){
          if(!$daisy->reserved && $found_status[$book_index][3]) {
            $daisy->id = 'D'.$daisy->id;
            array_push($result[sizeof($result)-1][3], $daisy);
          }
        }
      }

      $dvds = $book->dvd()->get();
      array_push($result[sizeof($result)-1], array());
      if($dvds){
        foreach($dvds as $dvd){
          if(!$dvd->reserved && $found_status[$book_index][4]) {
            $dvd->id = 'DVD'.$dvd->id;
            array_push($result[sizeof($result)-1][4], $dvd);
          }
        }
      }
      $book_index++;
    }
    return $result;
  }
}

