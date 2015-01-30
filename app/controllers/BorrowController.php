<?php

/*
$userId : of user that do action
$memberId : of borrower
$selectedList : array of selected media's object
*/


class BorrowController extends BaseController {

  public function index()
  {
    return View::make('borrow');
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
    # code...
    return $mediaId;
  }

  
  //TODO : Nut do this pls
  /*
  * Search for member
  * - by Member's id
  * - by Member's name
  * return Array of Member's Object if member existed
  *        null if member didnt existed
  */
  public function getMemberList($key)
  {
    # code...
  }


  /*
  * When User click on item of Member's list
  * Get Member of memberId and add to to borrower
  */
  public function postMember($memberId)
  {
    # code...
  }

  /*
  * Save list of borrowed book
  */
  public function postSubmitSelectedList($userId,$memberId,$selectedList)
  {
    # code...
  }


  public function search()
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
          $dvd->id = 'DV'.str_pad($dvd->id, 3, '0', STR_PAD_LEFT);
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
