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
    return View::make('borrow',array('borrow'=>$selectedList));
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
      $media['title']=$book['title'];
      //$media['item']=$item;
      //$media['----'];
      $selectedList[$mediaId]=$media;
      Session::put('borrow', $selectedList);
      $status=true;
    }

    return Response::json(array('status' => $status,'media'=>end($selectedList)));
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
    $memberTemp = Member::where('name', 'like', '%'.$member.'%')->orWhere('id', 'like', '%'.$member.'%')->get();

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
    $member_id=100; //TODO get Member's id
    //cassette_id

    //date_borrowed
  
    $dateBorrow = date("Y-m-d H:i:s");
    //date_returned
    //TODO What return date should kept? today+borrow time/specific return date
    $dateTmp = date_create_from_format('m/d/Y', Session::get('retdate', date("m/d/Y",strtotime(' +15 day'))));
    $dateReturn = date_format($dateTmp, 'Y-m-d H:i:s');

    //LOOP insert media into it tb
    foreach ($selectedList as $item) {
      echo $item['type'] . "   " . $item['id'] . "   " . $item['title'];
      echo "<br>";
      

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

    Session::forget('borrow');

    return "<hr>";
    //return ($selectedList);
  }

  public function getClear()
  {
    Session::forget('borrow');
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

    $dvd_condition  = in_array(substr($keyword, 0, 3), array("dvd", "dvD", "dVd", "dVD", "Dvd", "DvD", "DVd", "DVD")) && is_numeric(substr($keyword, 3));
    $cd_condition   = in_array(substr($keyword, 0, 2), array("cd", "cD", "Cd", "CD")) && is_numeric(substr($keyword, 2));
    $bcd_condition  = in_array(substr($keyword, 0, 1), array('b', 'c', 'd', 'B', 'C', 'D')) && is_numeric(substr($keyword, 1));

    //$result = $this->searchByName($keyword);
    if(is_numeric($keyword))
    $result = $this->searchByID($keyword, 1);
  else if($dvd_condition || $cd_condition || $bcd_condition)
    $result = $this->searchByID($keyword, 2);
  else
    $result = $this->searchByName($keyword);

    //return (!$book)?'true':'false';
    if(!$result){
      return '';
    } else {
      return json_encode($result);
    }
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
            $braille->id = 'B'.str_pad($braille->id, 3, '0', STR_PAD_LEFT);
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
            $cassette->id = 'C'.str_pad($cassette->id, 3, '0', STR_PAD_LEFT);
            array_push($result[sizeof($result)-1][1], $cassette);
          }
        }
      }

      $cds = $book->cd()->take(5)->get();
      array_push($result[sizeof($result)-1], array());
      if($cds){
        foreach($cds as $cd){
          if(!$cd->reserved){
            $cd->id = 'CD'.str_pad($cd->id, 3, '0', STR_PAD_LEFT);
            array_push($result[sizeof($result)-1][2], $cd);
          }
        }
      }

      $daisies = $book->daisy()->take(5)->get();
      array_push($result[sizeof($result)-1], array());
      if($daisies){
        foreach($daisies as $daisy){
          if(!$daisy->reserved) {
            $daisy->id = 'D'.str_pad($daisy->id, 3, '0', STR_PAD_LEFT);
            array_push($result[sizeof($result)-1][3], $daisy);
          }
        }
      }

      $dvds = $book->dvd()->take(5)->get();
      array_push($result[sizeof($result)-1], array());
      if($dvds){
        foreach($dvds as $dvd){
          if(!$dvd->reserved) {
            $dvd->id = 'DVD'.str_pad($dvd->id, 3, '0', STR_PAD_LEFT);
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
      if(in_array(substr($keyword, 0, 3), array("dvd", "Dvd", "DvD", "dVd", "dVD", "dvD", "DVd", "DVD"))) {
        $media = "dvd";
        $keyword = $this->getNumID($keyword, 3);
      }
      else if(in_array(substr($keyword, 0, 2), array("cd", "Cd", "cD", "CD"))) {
        $media = "cd";
        $keyword = $this->getNumID($keyword, 2);
      }
      else if(in_array(substr($keyword, 0, 1), array('b', 'c', 'd', 'B', 'C', 'D'))) {
        $media = substr($keyword, 0, 1);
        $keyword = $this->getNumID($keyword, 1);
      }

      switch (true) {
        case in_array($media, array('b', 'B')) :
          $braille = Braille::find($keyword);
          $books[0] = Book::find($braille->book_id);
          $found_status[0] = array(1, 0, 0, 0, 0);
          break;
        case in_array($media, array('c', 'C')) :
          $cassette = Cassette::find($keyword);
          $books[0] = Book::find($cassette->book_id);
          $found_status[0] = array(0, 1, 0, 0, 0);
          break;
        case $media == "cd" :
          $cd = CD::find($keyword);
          $books[0] = Book::find($cd->book_id);
          $found_status[0] = array(0, 0, 1, 0, 0);
          break;
        case in_array($media, array('d', 'D')) :
          $daisy = Daisy::find($keyword);
          $books[0] = Book::find($daisy->book_id);
          $found_status[0] = array(0, 0, 0, 1, 0);
          break;
        case $media == "dvd" :
          $dvd = DVD::find($keyword);
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
            $braille->id = 'B'.str_pad($braille->id, 3, '0', STR_PAD_LEFT);
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
            $cassette->id = 'C'.str_pad($cassette->id, 3, '0', STR_PAD_LEFT);
            array_push($result[sizeof($result)-1][1], $cassette);
          }
        }
      }

      $cds = $book->cd()->get();
      array_push($result[sizeof($result)-1], array());
      if($cds){
        foreach($cds as $cd){
          if($cd && !$cd->reserved && $found_status[$book_index][2]){
            $cd->id = 'CD'.str_pad($cd->id, 3, '0', STR_PAD_LEFT);
            array_push($result[sizeof($result)-1][2], $cd);
          }
        }
      }

      $daisies = $book->daisy()->get();
      array_push($result[sizeof($result)-1], array());
      if($daisies){
        foreach($daisies as $daisy){
          if(!$daisy->reserved && $found_status[$book_index][3]) {
            $daisy->id = 'D'.str_pad($daisy->id, 3, '0', STR_PAD_LEFT);
            array_push($result[sizeof($result)-1][3], $daisy);
          }
        }
      }

      $dvds = $book->dvd()->get();
      array_push($result[sizeof($result)-1], array());
      if($dvds){
        foreach($dvds as $dvd){
          if(!$dvd->reserved && $found_status[$book_index][4]) {
            $dvd->id = 'DVD'.str_pad($dvd->id, 3, '0', STR_PAD_LEFT);
            array_push($result[sizeof($result)-1][4], $dvd);
          }
        }
      }
      $book_index++;
    }
    return $result;
  }

  public function getNumID($string, $start_index)
  {
  $number = substr($string, $start_index);
    return (is_numeric($number)) ? (int) $number : null;
  }
}

