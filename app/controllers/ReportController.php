<?php

class ReportController extends BaseController {
  public function getIndex()
  {
    return View::make('library.report.index');
  }

  public function newReport()
  {
    return View::make('library.report.newReport');
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

  public function getBooks()
  {
    $book_filter  = Input::get("book");
    $prod_filter  = Input::get("prod");
    $id_mode      = Input::get("id_mode");
    $book_id_init = Input::get("book_id_init");
    $search_books = array();
    $prods = array();
    $count = 0;

    // id checked
    if($book_filter['enabled'][0] == true){
      if($id_mode != "-"){
        $book_by_id = Book::where('id', $id_mode, $book_filter['model'][0])->get();
      }else{
        $book_by_id = Book::whereBetween('id', array($book_id_init, $book_filter['model'][0]))->get();
      }
      array_push($search_books, $book_by_id);  
      $count++;
    }

    // title checked
    for($i=1; $i<count($book_filter['enabled']); $i++){
      if($book_filter['enabled'][$i] == true){
        $books = Book::where($book_filter['field'][$i], "LIKE", '%'.$book_filter['model'][$i].'%')->get(); 
        array_push($search_books, $books);
        $count++;
      }
    }
    // prod status checked
    for($i=0; $i<count($prod_filter['enabled']); $i++){
      if($prod_filter['enabled'][$i] == true){
        $books = Book::where($prod_filter['field'][$i], "=", $prod_filter['model'][$i])->get();
        array_push($search_books, $books);
        $count++;
      }
    }
    $data['books'] = $search_books;
    $data['prods'] = $prods;
    $data['count'] = $count;
    return $data;
  }

  public function getMedias()
  {
    $media_filter  = Input::get("media");
    $books         = Input::get("books");
    $media = array();
    $media['braille_detail'] = array();
    $media['cassette_detail'] = array();
    $media['daisy_detail'] = array();
    $media['cd_detail'] = array();
    $media['dvd_detail'] = array();

    for($i=0;$i<count($books);$i++){
      if($media_filter['enabled'][0] == true){
        $b_media = Braille::where("book_id", "=", $books[$i]['id'])->get();
        $media['braille'] = $b_media;
        for($j=0;$j<count($media['braille']);$j++){
          $media['braille'][$j]->book = $books[$i];
        }
      }
      if($media_filter['enabled'][1] == true){
        $c_media = Cassette::where("book_id", "=", $books[$i]['id'])->get();
        $media['cassette'] = $c_media;
        for($j=0;$j<count($media['cassette']);$j++){
          $media['cassette'][$j]->book = $books[$i];
        }      
      }
      if($media_filter['enabled'][2] == true){
        $d_media = Daisy::where("book_id", "=", $books[$i]['id'])->get();
        $media['daisy'] = $d_media;
        for($j=0;$j<count($media['daisy']);$j++){
          $media['daisy'][$j]->book = $books[$i];
        }      
      }
      if($media_filter['enabled'][3] == true){
        $cd_media = CD::where("book_id", "=", $books[$i]['id'])->get();
        $media['cd'] = $cd_media;
        for($j=0;$j<count($media['cd']);$j++){
          $media['cd'][$j]->book = $books[$i];
        }      
      }
      if($media_filter['enabled'][4] == true){
        $dvd_media = DVD::where("book_id", "=", $books[$i]['id'])->get();
        $media['dvd'] = $dvd_media;
        for($j=0;$j<count($media['dvd']);$j++){
          $media['dvd'][$j]->book = $books[$i];
        }        
      }
    }

    if($media_filter['enabled'][0] == true){
      for($i=0;$i<count($media['braille']);$i++){
        $b_detail = Brailledetail::where("braille_id", "=", $media['braille'][$i]->id)->where('status', '=', $media_filter['model'][0])->get();
        for($j=0;$j<count($b_detail);$j++){
          $b_detail[$j]->media  = $media['braille'][$i];
          array_push($media['braille_detail'], $b_detail[$j]);
        }
      }
    }
    if($media_filter['enabled'][1] == true){
      for($i=0;$i<count($media['cassette']);$i++){
        $c_detail = Cassettedetail::where("cassette_id", "=", $media['cassette'][$i]->id)->where('status', '=', $media_filter['model'][1])->get();
        for($j=0;$j<count($c_detail);$j++){
          $c_detail[$j]->media  = $media['cassette'][$i];
          array_push($media['cassette_detail'], $c_detail[$j]);
        }
      }
    }
    if($media_filter['enabled'][2] == true){
      for($i=0;$i<count($media['daisy']);$i++){
        $d_detail = Daisydetail::where("daisy_id", "=", $media['daisy'][$i]->id)->where('status', '=', $media_filter['model'][2])->get();
        for($j=0;$j<count($d_detail);$j++){
          $d_detail[$j]->media  = $media['daisy'][$i];
          array_push($media['daisy_detail'], $d_detail[$j]);
        }
      }
    }
    if($media_filter['enabled'][3] == true){
      for($i=0;$i<count($media['cd']);$i++){
        $cd_detail = Cddetail::where("cd_id", "=", $media['cd'][$i]->id)->where('status', '=', $media_filter['model'][3])->get();
        for($j=0;$j<count($cd_detail);$j++){
          $cd_detail[$j]->media  = $media['cd'][$i];
          array_push($media['cd_detail'], $cd_detail[$j]);
        }
      }
    }
    if($media_filter['enabled'][4] == true){
      for($i=0;$i<count($media['dvd']);$i++){
        $dvd_detail = Dvddetail::where("dvd_id", "=", $media['dvd'][$i]->id)->where('status', '=', $media_filter['model'][4])->get();
        for($j=0;$j<count($dvd_detail);$j++){
          $dvd_detail[$j]->media  = $media['dvd'][$i];
          array_push($media['dvd_detail'], $dvd_detail[$j]);
        }
      }
    }

    return $media;
  } 

  public function getProds()
  {
    $books  = Input::get("books");
    $prod  = array();
    $prods = array();
    for($i=0;$i<count($books);$i++){
      for($j=0;$j<5;$j++){
        $prod[$j] = BookProd::where('book_id', '=', $books[$i]['id'])->where('media_type', '=', $j)->where('status', "=", "ACTIVE")->orderBy('action', 'desc')->first();
      }
      array_push($prods, $prod);
    }

    return $prods;
  }

  public function exportCSV(){
    $media  = Input::get("media");
    $list = array
    (
      "สวัสดีนะ,Griffin,Oslo,Norway",
      "Glenn,Quagmire,Oslo,Norway",
    );

    $file = fopen("app/storage/csv/output.csv","w");
    fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
    foreach ($list as $line)
      {
        fputcsv($file,explode(',',$line));
      }

    fclose($file);      
  }



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
        if($key != "bm_status" && $key != "setcs_status" && $key != "setds_status" && $key != "setcd_status" && $key != "setdvd_status")
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
    $prod_arr;
    $arrayOfData["data"] = $prod_arr;
    $arrayOfData["col"] = $col_filter;
    Session::put('data', $arrayOfData);
    //return Session::get('data');
    return View::make("library.report.book.detail")->with($arrayOfData);
  }

  // export csv function 
  // you must sending result from search obj to this method.
/*  
public function exportCSV() {
    $obj = Session::get('data');
    $columns = $obj["col"];
    $obj_vals = $obj["data"];
    $csv_arr = array();
  
    $fp = fopen( storage_path().'/files/file.csv', 'w');
    
    // push column array.
    $csv_column = array();
    foreach ($columns as $col) {
      array_push($csv_column, self::toThaiTopic($col));
    }
    array_push($csv_column, "media id", "ตอนที่", "ชนิดสื่อ", "สถานะสื่อ");
    array_push($csv_arr, $csv_column);
    //array_push($csv_arr, $columns);
    
    // push object value;
    foreach($obj_vals as $obj_val) {
      $arr_row = array();
      $haveMedia = false;

      foreach($columns as $column){
        if($column == "bm_status" || $column == "setcs_status" || $column == "setds_status" || $column == "setcd_status" || $column == "setdvd_status") {
          array_push($arr_row, self::toThaiStatus($obj_val[$column])); 
        } 
        else {
          array_push($arr_row, $obj_val[$column]); 
        }    
      }

      if(count($obj_val["braille_prod"]) != 0) {
        foreach ($obj_val["braille_prod"] as $braille) {
          $braille_arr = $arr_row;
          array_push($braille_arr, $braille["braille_id"], $braille["part"], "เบลล์", self::toThaiMediaStatus($braille["status"]));
          array_push($csv_arr, $braille_arr);
        }
        $haveMedia = true;
      }
      if(count($obj_val["cassette_prod"]) != 0) {
        foreach ($obj_val["cassette_prod"] as $cassette) {
          $cassette_arr = $arr_row;
          array_push($cassette_arr, $cassette["cassette_id"], $cassette["part"], "คลาสเซ็ท", self::toThaiMediaStatus($cassette["status"]));
          array_push($csv_arr, $cassette_arr);
        }
        $haveMedia = true;
      }
      if(count($obj_val["daisy_prod"]) != 0) {
        foreach ($obj_val["daisy_prod"] as $daisy) {
          $daisy_arr = $arr_row;
          array_push($daisy_arr, $daisy["daisy_id"], $daisy["part"], "เดซี", self::toThaiMediaStatus($daisy["status"]));
          array_push($csv_arr, $daisy_arr);
        }
        $haveMedia = true;
      }
      if(count($obj_val["cd_prod"]) != 0) {
        foreach ($obj_val["cd_prod"] as $cd) {
          $cd_arr = $arr_row;
          array_push($cd_arr, $cd["cd_id"], $cd["part"], "CD", self::toThaiMediaStatus($cd["status"]));
          array_push($csv_arr, $cd_arr);
        }
        $haveMedia = true;
      }
      if(count($obj_val["dvd_prod"]) != 0) {
        foreach ($obj_val["dvd_prod"] as $dvd) {
          $dvd_arr = $arr_row;
          array_push($dvd_arr, $dvd["dvd_id"], $dvd["part"], "DVD", self::toThaiMediaStatus($dvd["status"]));
          array_push($csv_arr, $dvd_arr);
        }
        $haveMedia = true;
      }

      if($haveMedia == false) {
        $arr_no_media = $arr_row;
        array_push($arr_no_media, "", "", "", "");
        array_push($csv_arr, $arr_no_media);
      }
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
      'Content-Type' => 'text/csv'
      );
    $filepath = storage_path().'/files/file.csv';
    
    // delete file when user already downloaded.
    App::finish(function($request, $response) use ($filepath)
    {
        unlink($filepath);
    });
    return Response::download(storage_path().'/files/file.csv', 'file.csv', $headers);
  }

  public function toThaiTopic($col) {
    if($col == "title") {
      return "ชื่อเรื่อง";
    }
    else if($col == "author") {
      return "ชื่อผู้แต่ง";
    }
    else if($col == "translate") {
      return "ชื่อผู้แปล";
    }
    else if($col == "pub_year") {
      return "ปีที่พิมพ์";
    }
    else if($col == "bm_status") {
      return "สถานะการผลิตเบรลล์";
    }
    else if($col == "setcs_status") {
      return "สถานะการผลิตคาสเซ็ท";
    }
    else if($col == "setds_status") {
      return "สถานะการผลิตเดซี่";
    }
    else if($col == "setcd_status") {
      return "สถานะการผลิต CD";
    }
    else if($col == "setdvd_status") {
      return "สถานะการผลิต DVD";
    }
    else {
      return $col;
    }
  }

  public function toThaiStatus($status) {
    if($status == 0) {
      return "ไม่ผลิต";
    }
    else if($status == 1) {
      return "ผลิต";
    }
    else if($status == 2) {
      return "จองอ่าน";
    }
    else if($status == 3) {
      return "กำลังผลิต";
    } 
  }

  public function toThaiMediaStatus($media) {
    if($media == 0) {
      return "ปกติ";
    }
    else if($media == 1) {
      return "ชำรุด";
    }
    else if($media == 2) {
      return "ซ่อม";
    }
  }
  */
}
