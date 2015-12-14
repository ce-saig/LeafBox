<?php

class ReportController extends BaseController {
  public function getIndex()
  {
    return View::make('library.report.index');
  }
/*
  public function convertOperator($raw_oper)
  {
    if($raw_oper == 0) {
      return "LIKE";
    }
    else if($raw_oper == 1) {
      return "=";
    }
    else if($raw_oper == 2) {
      return ">";
    }
    else if($raw_oper == 3) {
      return "<";
    }
  }*/

 /* public function valueForWhere($operator,$value)
  {
    if($operator == "LIKE") {
      return "%".$value."%";
    }
    return $value;
  }
*/
  public function getBookDetail()
  {
    if(count(Input::all()) == 0 ) return "You have to select some boxes.";
    $book_filter = Input::get("book-filter");
    $media_filter = Input::get("media-filter");
    $book = Book::where("id",">","0");
    //return Input::all();
    $fn_value=function($operator,$value){
        if($operator == "LIKE") {
          return "%".$value."%";
        }
        return $value;
    };

    $fn_operator=function($raw_oper){
      if($raw_oper == 0) {
        return "LIKE";
      }
      else if($raw_oper == 1) {
        return "=";
      }
      else if($raw_oper == 2) {
        return ">";
      }
      else if($raw_oper == 3) {
        return "<";
      }
    };

    if(count($book_filter) != 0) {
      foreach ($book_filter as $key) {
        $text = Input::get($key."-text");
        $select = Input::get($key."-option");
        $book = $book->where($key, $fn_operator($select), $fn_value($fn_operator($select),$text));
      } 
    }
    if(count($media_filter) != 0) {
      foreach ($media_filter as $key) {
        $status = Input::get($key."-option");
        $book = $book->where($key, "=", $status);
      }
    }
    $book = $book->get();
    return $book;  
    $arrayOfData["data"] = $book;
    $arrayOfData["col"] = $book_filter;
    //return View::make("library.report.book.detail")->with($arrayOfData);
  }
}

