<?php

class ReportController extends BaseController {
  public function getIndex()
  {
    return View::make('library.report.index');
  }

  public function getBookDetail()
  {
    $filter_title = Input::get("filter_title");
    $title = Input::get("title");
    $col_filter = Input::get("col");
    $allBook = Book::where("title","LIKE","%$title%")->get();
    $arrayOfData["data"] = $allBook;
    $arrayOfData["col"] = $col_filter;
    return View::make("library.report.book.detail")->with($arrayOfData);
  }
}

