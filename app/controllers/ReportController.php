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
    $book_filter = Input::get("book-filter");
    $media_filter = Input::get("media-filter");
    return $book_filter;
    $book = Book::where("id",">","0");

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

    foreach ($book_filter as $key) {
      $text = Input::get($key);
      $select = Input::get($key."-select");
      $book = $book->where($key, $fn_operator($select), $fn_value($fn_operator($select),$text));
    } 
    $book = $book->get();
    $arrayOfData["data"] = $allBook;
    $arrayOfData["col"] = $col_filter;
    return View::make("library.report.book.detail")->with($arrayOfData);
  }
}

