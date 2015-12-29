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
    $col_filter = Input::get("result-column-filter");
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

    $prod_arr = [[]];
    if(count($media_filter) != 0) { 
      $count_book = 0;
      foreach ($book as $key) {
        $braille_prod = [];
        $cassette_prod = [];
        $daisy_prod = [];
        $cd_prod = [];
        $dvd_prod = [];
        $haveMedia = false;
        foreach ($media_filter as $m_filter) {
          $status = Input::get($m_filter."-option");
          if($m_filter == "braille-prod") {
            $braille = Braille::where("book_id","=",$key["id"])->get();
            foreach ($braille as $brail) {
              $braille_detail = Brailledetail::where("braille_id","=",$brail["id"])->where("status","=",$status)->get();
              foreach ($braille_detail as $br) {
                array_push($braille_prod, $br);
                if($haveMedia == false) {
                  $haveMedia = true;
                }
              }
            }
          }
          else if($m_filter == "cassette-prod") {
            $cassette = Cassette::where("book_id","=",$key["id"])->get();
            foreach ($cassette as $cass) {
              $cassette_detail = Cassettedetail::where("cassette_id","=",$cass["id"])->where("status","=",$status)->get();
              foreach ($cassette_detail as $cs) {
                array_push($cassette_prod, $cs);
                if($haveMedia == false) {
                  $haveMedia = true;
                }
              }
            }
          }
          else if($m_filter == "daisy-prod") {
            $daisy = Daisy::where("book_id","=",$key["id"])->get();
            foreach ($daisy as $dais) {
              $daisy_detail = Daisydetail::where("daisy_id","=",$dais["id"])->where("status","=",$status)->get();
              foreach ($daisy_detail as $ds) {
                array_push($daisy_prod, $ds);
                if($haveMedia == false) {
                  $haveMedia = true;
                }
              }
            }
          }
          else if($m_filter == "cd-prod") {
            $cd = CD::where("book_id","=",$key["id"])->get();
            foreach ($cd as $cd_ea) {
              $cd_detail = Cddetail::where("cd_id","=",$cd_ea["id"])->where("status","=",$status)->get();
              foreach ($cd_detail as $cd_de) {
                array_push($cd_prod, $cd_de);
                if($haveMedia == false) {
                  $haveMedia = true;
                }
              }
            }
          }
          else if($m_filter == "dvd-prod") {
            $dvd = DVD::where("book_id","=",$key["id"])->get();
            foreach ($dvd as $dvd_ea) {
              $dvd_detail = Dvddetail::where("dvd_id","=",$dvd_ea["id"])->where("status","=",$status)->get();
              foreach ($dvd_detail as $dvd_de) {
                array_push($dvd_prod, $dvd_de);
                if($haveMedia == false) {
                  $haveMedia = true;
                }
              }
            }
          }
        }
        if($haveMedia == true) {
          $prod_arr[$count_book] = $key;
          $prod_arr[$count_book]['braille_prod'] = $braille_prod;
          $prod_arr[$count_book]['cassette_prod'] = $cassette_prod;
          $prod_arr[$count_book]['daisy_prod'] = $daisy_prod;
          $prod_arr[$count_book]['cd_prod'] = $cd_prod;
          $prod_arr[$count_book]['dvd_prod'] = $dvd_prod;
          $count_book++;
        }
      }
    }
    else {
      $count_book = 0;
      foreach ($book as $key) {
        $prod_arr[$count_book] = $key;
        $braille_prod = [];
        $cassette_prod = [];
        $daisy_prod = [];
        $cd_prod = [];
        $dvd_prod = [];

        $prod_arr[$count_book] = $key;
        $braille = Braille::where("book_id","=",$key["id"])->get();
        foreach ($braille as $brail) {
          $braille_detail = Brailledetail::where("braille_id","=",$brail["id"])->get();
          foreach ($braille_detail as $br) {
            array_push($braille_prod, $br);
          }
        }
        
        $cassette = Cassette::where("book_id","=",$key["id"])->get();
        foreach ($cassette as $cass) {
          $cassette_detail = Cassettedetail::where("cassette_id","=",$cass["id"])->get();
          foreach ($cassette_detail as $cs) {
            array_push($cassette_prod, $cs);
          }
        }

        $daisy = Daisy::where("book_id","=",$key["id"])->get();
        foreach ($daisy as $dais) {
          $daisy_detail = Daisydetail::where("daisy_id","=",$dais["id"])->get();
          foreach ($daisy_detail as $ds) {
            array_push($daisy_prod, $ds);
          }
        }
        
        $cd = CD::where("book_id","=",$key["id"])->get();
        foreach ($cd as $cd_ea) {
          $cd_detail = Cddetail::where("cd_id","=",$cd_ea["id"])->get();
          foreach ($cd_detail as $cd_de) {
            array_push($cd_prod, $cd_de);
          }
        }

        $dvd = DVD::where("book_id","=",$key["id"])->get();
        foreach ($dvd as $dvd_ea) {
          $dvd_detail = Dvddetail::where("dvd_id","=",$dvd_ea["id"])->get();
          foreach ($dvd_detail as $dvd_de) {
            array_push($dvd_prod, $dvd_de);
          }
        }
        $prod_arr[$count_book]['braille_prod'] = $braille_prod;
        $prod_arr[$count_book]['cassette_prod'] = $cassette_prod;
        $prod_arr[$count_book]['daisy_prod'] = $daisy_prod;
        $prod_arr[$count_book]['cd_prod'] = $cd_prod;
        $prod_arr[$count_book]['dvd_prod'] = $dvd_prod;
        $count_book++;
      }
    }
    //return $prod_arr;
    $arrayOfData["data"] = $prod_arr;
    $arrayOfData["col"] = $col_filter;
    Session::put('data', $arrayOfData);
    //return Session::get('data');
    return View::make("library.report.book.detail")->with($arrayOfData);
  }

  // export csv function 
  // you must sending result from search obj to this method.
  public function exportCSV() {
    $obj = Session::get('data');
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
    // parameter
    $headers = array
    (
      'Content-Encoding: UTF-8',
      'Content-Type' => 'text/csv',
      );
    $filepath = storage_path().'/files/file.csv';
    
    // delete file when user already downloaded.
    App::finish(function($request, $response) use ($filepath)
    {
        unlink($filepath);
    });
    return Response::download(storage_path().'/files/file.csv', 'file.csv', $headers);
  }

}
