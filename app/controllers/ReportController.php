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
    $allBook = Book::where("title","LIKE","%$title%")->get();
    $arrayOfData["data"] = $allBook;
    return View::make("library.report.book.detail")->with($arrayOfData);
  }
}

