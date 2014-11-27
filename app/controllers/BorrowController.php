<?php

class BorrowController extends BaseController {
  public function index()
  {
    return View::make('borrow');
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
      //return $book->id;
      //var_dump($book->braille()->get());
      //return'';
      //return Book::find($book->braille()->first()->book_id)->id;
      //return Book$book->braille()->first()->id;
      array_push($result, array_fill_keys(array('title'),$book->title));
      array_push($result[sizeof($result)-1], array());
      //return $result;
      $brailles = $book->braille()->get();
      //return sizeof($brailles);
      if($brailles){
        foreach($brailles as $braille){
          array_push($result[sizeof($result)-1][0], $braille);
        }
      }
    }
    //return (!$book)?'true':'false';
    if(!$result){
      return '';
    } else {
      return json_encode($result[0][0]);
    }

  }
}
