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

    foreach ($book_filter as $key) {
      $text = Input::get($key."-text");
      $select = Input::get($key."-option");
      $book = $book->where($key, $fn_operator($select), $fn_value($fn_operator($select),$text));
    } 
    $book = $book->get();  
    $arrayOfData["data"] = $book;
    $arrayOfData["col"] = $book_filter;
    // CSV export
    exportCSVTest($arrayOfData);
    return View::make("library.report.book.detail")->with($arrayOfData);
  }

public function exportCSV($obj) {

  $columns = $obj["col"];
  $obj_vals = $obj["data"];
  $csv_arr = array();

  $fp = fopen( storage_path().'/files/file.csv', 'w');
  
  // push column array.
  array_push($csv_arr, $columns);
  
  // push object value;
  foreach($obj_vals as $obj_val) {
    $arr_row = array();
    foreach($columns as $column){      
      array_push($arr_row, $obj_val[$column]); 
    }
    array_push($csv_arr, $arr_row);
  }

  // create csv file 
  foreach($csv_arr as $csv_row){
    fputcsv($fp, $csv_row);
  }

  fclose($fp);
  $headers = array('Content-Type' => 'text/csv');
  return Response::download(storage_path().'/files/file.csv', 'file.csv', $headers);
}

}

function exportCSVTest($obj) {

  $columns = $obj["col"];
  $obj_vals = $obj["data"];
  $csv_arr = array();

  $fp = fopen( storage_path().'/files/file.csv', 'w');
  
  // push column array.
  array_push($csv_arr, $columns);
  
  // push object value;
  foreach($obj_vals as $obj_val) {
    $arr_row = array();
    foreach($columns as $column){      
      array_push($arr_row, $obj_val[$column]); 
    }
    array_push($csv_arr, $arr_row);
  }

  // create csv file 
  foreach($csv_arr as $csv_row){
    fputcsv($fp, $csv_row);
  }

  fclose($fp);
  $headers = array('Content-Type' => 'text/csv');
  return Response::download(storage_path().'/files/file.csv', 'file.csv', $headers);
}
