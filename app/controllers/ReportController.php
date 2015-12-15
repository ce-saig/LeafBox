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
        if($select != "bm_status" && $select != "setcs_status" && $select != "setds_status" && $select != "setcd_status" && $select != "setdvd_status")
          $book = $book->where($key, $fn_operator($select), $fn_value($fn_operator($select),$text));
        else
          $book = $book->where($key, "=", $select);
      } 
    }
    $book = $book->get();

    $prod_arr = [];
    if(count($media_filter) != 0) { 
      foreach ($book as $key) {
        foreach ($media_filter as $m_filter) {
          $status = Input::get($m_filter."-option");
          if($m_filter == "braille-prod") {
            $braille = Braille::where("book_id","=",$key["id"])->get();
            foreach ($braille as $brail) {
              $braille_detail = Brailledetail::where("braille_id","=",$brail["id"])->where("status","=",$status)->get();
              foreach ($braille_detail as $br) {
                array_push($prod_arr,$br);
              }
            }
          }
          else if($m_filter == "cassette-prod") {
            $cassette = Cassette::where("book_id","=",$key["id"])->get();
            foreach ($cassette as $cass) {
              $cassette_detail = Cassettedetail::where("cassette_id","=",$cass["id"])->where("status","=",$status)->get();
              foreach ($cassette_detail as $cs) {
                array_push($prod_arr,$cs);
              }
            }
          }
          else if($m_filter == "daisy-prod") {
            $daisy = Daisy::where("book_id","=",$key["id"])->get();
            foreach ($daisy as $dais) {
              $daisy_detail = Daisydetail::where("daisy_id","=",$dais["id"])->where("status","=",$status)->get();
              foreach ($daisy_detail as $ds) {
                array_push($prod_arr,$ds);
              }
            }
          }
          else if($m_filter == "cd-prod") {
            $cd = Cd::where("book_id","=",$key["id"])->get();
            foreach ($cd as $cd_ea) {
              $cd_detail = Cddetail::where("cd_id","=",$cd_ea["id"])->where("status","=",$status)->get();
              foreach ($cd_detail as $cd_de) {
                array_push($prod_arr,$cd_de);
              }
            }
          }
          else if($m_filter == "dvd-prod") {
            $dvd = Dvd::where("book_id","=",$key["id"])->get();
            foreach ($dvd as $dvd_ea) {
              $dvd_detail = Dvddetail::where("dvd_id","=",$dvd_ea["id"])->where("status","=",$status)->get();
              foreach ($dvd_detail as $dvd_de) {
                array_push($prod_arr,$dvd_de);
              }
            }
          }
        }
      }
    }
    return $prod_arr;  
    $arrayOfData["data"] = $book;
    $arrayOfData["col"] = $book_filter;
    //return View::make("library.report.book.detail")->with($arrayOfData);
  }
}

