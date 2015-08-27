<?php

class ReportController extends BaseController {
  public function getIndex()
  {
    return View::make('library.report.index');
  }

  public function getBookDetail()
  {
    $allBook = Book::all();
    $arrayOfData["data"] = $allBook;
    return View::make('library.report.book.detail')->with($arrayOfData);
  }
}

