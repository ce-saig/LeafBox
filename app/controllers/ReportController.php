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
    $borrowers     = Input::get("borrowers");
    $media         = array();
    $media['braille']   = array();
    $media['cassette']  = array();
    $media['daisy']     = array();
    $media['cd']        = array();
    $media['dvd']       = array();
    $media['braille_detail']  = array();
    $media['cassette_detail'] = array();
    $media['daisy_detail']    = array();
    $media['cd_detail']       = array();
    $media['dvd_detail']      = array();

    $init_j = 0;
    // Media from Book
    foreach($books as $book){
      if($media_filter['enabled'][0] == true){
        $b_media = Braille::where("book_id", "=", $book['id'])->get();
        foreach($b_media as $m){
          $m->borrow = Brailleborrow::where("braille_id", "=", $m->id)->orderBy('date_borrowed', 'desc')->first();
          if($m->borrow!=null)
            $m->borrower = Member::where("id", "=", $m->borrow->member_id)->first();
          $m->book = $book;
          array_push($media['braille'], $m);
        }
      }
      if($media_filter['enabled'][1] == true){
        $c_media = Cassette::where("book_id", "=", $book['id'])->get();
        foreach($c_media as $m){
          $m->borrow = Cassetteborrow::where("cassette_id", "=", $m->id)->orderBy('date_borrowed', 'desc')->first();
          if($m->borrow!=null)
            $m->borrower = Member::where("id", "=", $m->borrow->member_id)->first();
          $m->book = $book;
          array_push($media['cassette'], $m);
        }
      }
      if($media_filter['enabled'][2] == true){
        $d_media = Daisy::where("book_id", "=", $book['id'])->get();
        foreach($d_media as $m){
          $m->borrow = Daisyborrow::where("daisy_id", "=", $m->id)->orderBy('date_borrowed', 'desc')->first();
          if($m->borrow!=null)
            $m->borrower = Member::where("id", "=", $m->borrow->member_id)->first();
          $m->book = $book;
          array_push($media['daisy'], $m);
        }
      }
      if($media_filter['enabled'][3] == true){
        $cd_media = CD::where("book_id", "=", $book['id'])->get();
        foreach($cd_media as $m){
          $m->borrow = Cdborrow::where("cd_id", "=", $m->id)->orderBy('date_borrowed', 'desc')->first();
          if($m->borrow!=null)
            $m->borrower = Member::where("id", "=", $m->borrow->member_id)->first();
          $m->book = $book;
          array_push($media['cd'], $m);
        }
      }
      if($media_filter['enabled'][4] == true){
        $dvd_media = DVD::where("book_id", "=", $book['id'])->get();
        foreach($dvd_media as $m){
          $m->borrow = Dvdborrow::where("dvd_id", "=", $m->id)->orderBy('date_borrowed', 'desc')->first();
          if($m->borrow!=null)
            $m->borrower = Member::where("id", "=", $m->borrow->member_id)->first();
          $m->book = $book;
          array_push($media['dvd'], $m);
        }
      }
    }
/*
    // Media form Borrower
    $media_borrower = array();
    $mb = array();
    if($borrowers['enabled'][0] == true){
      if($borrowers['id_mode'] != "-"){
        $mb[0] = Brailleborrow::where('braille_id', $id_mode, $borrowers['model'][0])->get();
        $mb[1] = Cassetteborrow::where('cassette_id', $id_mode, $borrowers['model'][0])->get();
        $mb[2] = Daisyborrow::where('daisy_id', $id_mode, $borrowers['model'][0])->get();
        $mb[3] = Cdborrow::where('cd_id', $id_mode, $borrowers['model'][0])->get();
        $mb[4] = Dvdborrow::where('dvd_id', $id_mode, $borrowers['model'][0])->get();
      }else{
        $mb[0] = Brailleborrow::whereBetween('braille_id', array($borrowers['init_id'], $borrowers['model'][0]))->get();
        $mb[1] = Cassetteborrow::whereBetween('cassette_id', array($borrowers['init_id'], $borrowers['model'][0]))->get();
        $mb[2] = Daisyborrow::whereBetween('daisy_id', array($borrowers['init_id'], $borrowers['model'][0]))->get();  
        $mb[3] = Cdborrow::whereBetween('cd_id', array($borrowers['init_id'], $borrowers['model'][0]))->get();
        $mb[4] = Dvdborrow::whereBetween('dvd_id', array($borrowers['init_id'], $borrowers['model'][0]))->get();  
      }
      foreach($mb as $m){
        for($i=0;$i<count($m);$i++){
          array_push($media_borrower, $m);
        }            
      }      
    }
    return $media_borrower;
*/

    // Media Detail from Media
    if($media_filter['enabled'][0] == true){
      foreach($media['braille'] as $m){
        $b_detail = Brailledetail::where("braille_id", "=", $m->id)->where('status', '=', $media_filter['model'][0])->get();
        for($j=0;$j<count($b_detail);$j++){
          $b_detail[$j]->media  = $m;
          array_push($media['braille_detail'], $b_detail[$j]);
        }
      }
      
    }
    if($media_filter['enabled'][1] == true){
      foreach($media['cassette'] as $m){
        $c_detail = Cassettedetail::where("cassette_id", "=", $m->id)->where('status', '=', $media_filter['model'][1])->get();
        for($j=0;$j<count($c_detail);$j++){
          $c_detail[$j]->media  = $m;
          array_push($media['cassette_detail'], $c_detail[$j]);
        }
        
      }
    }
    if($media_filter['enabled'][2] == true){
      foreach($media['daisy'] as $m){
          $d_detail = Daisydetail::where("daisy_id", "=", $m->id)->where('status', '=', $media_filter['model'][2])->get();
          for($j=0;$j<count($d_detail);$j++){
            $d_detail[$j]->media  = $m;
            array_push($media['daisy_detail'], $d_detail[$j]);
          }
        
      }
    }
    if($media_filter['enabled'][3] == true){
      foreach($media['cd'] as $m){
        $cd_detail = Cddetail::where("cd_id", "=", $m->id)->where('status', '=', $media_filter['model'][3])->get();
        for($j=0;$j<count($cd_detail);$j++){
          $cd_detail[$j]->media  = $m;
          array_push($media['cd_detail'], $cd_detail[$j]);
        } 
      }
    }
    if($media_filter['enabled'][4] == true){
      foreach($media['dvd'] as $m){
        $dvd_detail = Dvddetail::where("dvd_id", "=", $m->id)->where('status', '=', $media_filter['model'][4])->get();
        for($j=0;$j<count($dvd_detail);$j++){
          $dvd_detail[$j]->media  = $m;
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
    $column  = Input::get("column");
    $book  = Input::get("book");
    $media  = Input::get("media");
    $media_input  = Input::get("media_input");
    $prod_status  = Input::get("prod_status");
    $havemedia = Input::get("havemedia");
    $media_label = Input::get("media_label");
    $borrow_label = Input::get("borrow_label");
    $table_download = Input::get("table_download");
    $header = "";
    $body = "";
    $bodys = array();

    for($j=0;$j<count($column['enabled']);$j++){
      if($column['enabled'][$j] == true){
        $header = $header . $column['label'][$j] . ',';
      }
    }
    substr($header, 0, count($header)-1); 

    for($i=0;$i<count($book);$i++){
      for($j=0;$j<count($column['enabled']);$j++){
        if($column['enabled'][$j] == true){
          switch($column['field'][$j]) {
            case 'bm_status':
              $body = $body . $prod_status[0][$book[$i][$column['field'][$j]]] . ',';
              break;
            case 'setcs_status':
              $body = $body . $prod_status[1][$book[$i][$column['field'][$j]]] . ',';
              break;
            case 'setds_status':
              $body = $body . $prod_status[2][$book[$i][$column['field'][$j]]] . ',';
              break;
            case 'setcd_status':
              $body = $body . $prod_status[3][$book[$i][$column['field'][$j]]] . ',';
              break;
            case 'setdvd_status':
              $body = $body . $prod_status[4][$book[$i][$column['field'][$j]]] . ',';
              break;            
            default:
              $body = $body . $book[$i][$column['field'][$j]] . ',';
              break;
          }
        }
      }
      substr($header, 0, count($body)-1);
      array_push($bodys, $body);
      $body = "";  
    } 

    $file = fopen("public/php/csv/output.csv","w");
    fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));

    if($table_download[0]==true){
      $list = array($header    );
      foreach ($bodys as $b){
        array_push($list, $b);
      }

      foreach ($list as $line)
        {
          fputcsv($file,explode(',',$line));
        }
      
      fputcsv($file,explode(','," "));
    }

    if($havemedia == true && $table_download[1] == true){
      $header = "";
      $body = "";
      $bodys = array();
      for($i=0;$i<count($borrow_label);$i++){
        $header = $header . $borrow_label[$i] . ',';
      }
      fputcsv($file,explode(',',$header));
      if($media_input['enabled'][0] == true){
        foreach($media['braille'] as $key => $m){
          $body = $m['book']['title'].',เบรลล์,'.$m['id'].','.$m['numpart'];
          if($m['borrow'] != null && $m['borrower'] != null){
            $body = $body.','.$m['borrower']['name'].','.$m['borrow']['date_borrowed'];
          }
          fputcsv($file,explode(',',$body));
          $body = "";
        }
      }
      if($media_input['enabled'][1] == true){
        foreach($media['cassette'] as $key => $m){
          $body = $m['book']['title'].',คาสเซ็ท,'.$m['id'].','.$m['numpart'];
          if($m['borrow'] != null && $m['borrower'] != null){
            $body = $body.','.$m['borrower']['name'].','.$m['borrow']['date_borrowed'];
          }
          fputcsv($file,explode(',',$body));
          $body = "";
        }
      }
      if($media_input['enabled'][2] == true){
        foreach($media['daisy'] as $key => $m){
          $body = $m['book']['title'].',เดซี่,'.$m['id'].','.$m['numpart'];
          if($m['borrow'] != null && $m['borrower'] != null){
            $body = $body.','.$m['borrower']['name'].','.$m['borrow']['date_borrowed'];
          }
          fputcsv($file,explode(',',$body));
          $body = "";
        }
      }
      if($media_input['enabled'][3] == true){
        foreach($media['cd'] as $key => $m){
          $body = $m['book']['title'].',ซีดี,'.$m['id'].','.$m['numpart'];
          if($m['borrow'] != null && $m['borrower'] != null){
            $body = $body.','.$m['borrower']['name'].','.$m['borrow']['date_borrowed'];
          }
          fputcsv($file,explode(',',$body));
          $body = "";
        }
      }
      if($media_input['enabled'][4] == true){
        foreach($media['dvd'] as $key => $m){
          $body = $m['book']['title'].',ดีวีดี,'.$m['id'].','.$m['numpart'];
          if($m['borrow'] != null && $m['borrower'] != null){
            $body = $body.','.$m['borrower']['name'].','.$m['borrow']['date_borrowed'];
          }
          fputcsv($file,explode(',',$body));
          $body = "";
        }
      }
      fputcsv($file,explode(','," "));
    }

    if($havemedia == true && $table_download[2] == true){
      $header = "";
      $body = "";
      $bodys = array();
      for($i=0;$i<count($media_label);$i++){
        $header = $header . $media_label[$i] . ',';
      }
      fputcsv($file,explode(',',$header));
      if($media_input['enabled'][0] == true){
        foreach($media['braille_detail'] as $key => $m){
          $body = $m['braille_id'].','.$m['id'].','.$m['part'].' จาก '.$m['media']['numpart'].','.$media_input['label'][$m['status']].','.$m['media']['book']['title'].',เบรลล์,';
          fputcsv($file,explode(',',$body));
          $body = "";
        }
      }
      if($media_input['enabled'][1] == true){
        foreach($media['cassette_detail'] as $key => $m){
          $body = $m['cassette_id'].','.$m['id'].','.$m['part'].' จาก '.$m['media']['numpart'].','.$media_input['label'][$m['status']].','.$m['media']['book']['title'].',เบรลล์,';
          fputcsv($file,explode(',',$body));
          $body = "";
        }
      }
      if($media_input['enabled'][2] == true){
        foreach($media['daisy_detail'] as $key => $m){
          $body = $m['daisy_id'].','.$m['id'].','.$m['part'].' จาก '.$m['media']['numpart'].','.$media_input['label'][$m['status']].','.$m['media']['book']['title'].',เบรลล์,';
          fputcsv($file,explode(',',$body));
          $body = "";
        }
      }
      if($media_input['enabled'][3] == true){
        foreach($media['cd_detail'] as $key => $m){
          $body = $m['cd_id'].','.$m['id'].','.$m['part'].' จาก '.$m['media']['numpart'].','.$media_input['label'][$m['status']].','.$m['media']['book']['title'].',เบรลล์,';
          fputcsv($file,explode(',',$body));
          $body = "";
        }
      }
      if($media_input['enabled'][4] == true){
        foreach($media['dvd_detail'] as $key => $m){
          $body = $m['dvd_id'].','.$m['id'].','.$m['part'].' จาก '.$m['media']['numpart'].','.$media_input['label'][$m['status']].','.$m['media']['book']['title'].',เบรลล์,';
          fputcsv($file,explode(',',$body));
          $body = "";
        }
      }
      fputcsv($file,explode(','," "));
    }

    fclose($file);
    return "file at ../public/php/csv/output.csv";
  }

}
