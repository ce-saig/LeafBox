<?php
class BookController extends Controller{

  public function newBook(){
    return View::make('library.book.add');
  }

  public function postBook(){
    $Book = new Book;
    //$Book = Book::where('id','=','2')->count();
    $Book->isbn = Input::get('isbn');
    $Book->title = Input::get('title');
    $Book->author = Input::get('author');
    $Book->translate = Input::get('translate');
    $Book->grade = Input::get('grade');
    $Book->abstract = Input::get('abstract');
    $Book->book_type = Input::get('book_type');
    $Book->produce_no = Input::get('produce_no');
    $Book->original_no = Input::get('original_no');     
    $Book->pub_no = Input::get('pub_no');
    $Book->pub_year = Input::get('pub_year');
    $Book->publisher = Input::get('publisher');
    $Book->save();  
    //$data['book']=$Book;
    //$data['num']=3;
    //return View::make('hgdu',$data);
    return Redirect::to('book/add');
  }

  public function addBraille($bookId){
    $braille = new Braille();
    
    $braille->book()->associate(Book::find($bookId));
    $braille->produced = date('Y-m-d');
    $braille->save();
  }

  public function addCassette($bookId){
    $amount = Input::get('amount');
    $cassette = new Cassette();
    $cassette->produced_date = date('Y-m-d');
    $cassette->book()->associate(Book::find($bookId));
    $cassette->save();

    for($i=1; $i<=$amount; $i++){
      $cassetteDetail = new Cassettedetail();
      $cassetteDetail->part = $i;
      $cassetteDetail->cassette()->associate($cassette);
      $cassetteDetail->save();
    }
  }

  public function addDaisy($bookId){
    $amount = Input::get('amount');
    $amount = 3;
    $daisy = new Daisy();
    $daisy->produced = date('Y-m-d');
    $daisy->numpart = $amount;
    $daisy->book()->associate(Book::find($bookId));
    $daisy->save();

    for($i=1; $i<=$amount; $i++){
      $daisydetail = new Daisydetail();
      $daisydetail->part = $i;
      $daisydetail->daisy()->associate($daisy);
      $daisydetail->save();
    }
  }

  public function addCD($bookId){
    $amount = Input::get('amount');
    $cd = new CD();
    $cd->produce_date = date('Y-m-d');
    $cd->book()->associate(Book::find($bookId));
    $cd->numpart = $amount;
    $cd->save();

    for($i=1; $i<=$amount; $i++){
      $cddetail = new Cddetail();
      $cddetail->part = $i;
      $cddetail->cd()->associate($cd);
      $cddetail->save();
    }
  }
  public function addDVD($bookId){
    $amount = Input::get('amount');
    $dvd = new DVD();
    $dvd->produced_date = date('Y-m-d');
    $dvd->book()->associate(Book::find($bookId));
    $dvd->numpart = $amount;
    $dvd->save();

    for($i=1; $i<=$amount; $i++){
      $dvddetail = new Dvddetail();
      $dvddetail->part = $i;
      $dvddetail->dvd()->associate($dvd);
      $dvddetail->save();
    }
  }

  public function getBook($bid){
      $bookEloquent = Book::find($bid);
      $field[0]='title';
      $field[1]='author';
      $field[2]='translate';
      $field[3]='regis_date';
      $field[4]='publisher';
      $field[5]='pub_no';
      $field[6]='pub_year';
      $field[7]='origin_no';
      $field[8]='produce_no';
      $field[9]='btype';
      $field[10]='abstract';
      $field[11]='b_number';
      $field[12]='cs_number';
      $field[13]='ds_number';
      $field[14]='cd_number';
      $field[15]='dvd_number';
      $field[16]='isbn';
      $field[17]='id';
      $field[18]='grade';
      $field[19]='bm_status';
      $field[20]='bm_note';
      $field[21]='bm_data';
      $field[22]='setcs_status';
      $field[23]='setcs_note';
      $field[24]='setcs_data';
      $field[25]='setds_status';
      $field[26]='setds_note';
      $field[27]='setds_data';
      $field[28]='setcd_status';
      $field[29]='setcd_note';
      $field[30]='setcd_data';
      $field[31]='setdvd_status';
      $field[32]='setdvd_note';
      $field[33]='setdvd_data';
  
      $book['title']         =  $bookEloquent->title;
      $book['author']        = $bookEloquent->author ;
      $book['translate']     = $bookEloquent->translate ;
      $book['regis_date']     = $bookEloquent->regis_date ;
      $book['publisher']     = $bookEloquent->publisher ;
      $book['pub_no']     = $bookEloquent->pub_no ;
      $book['pub_year']     = $bookEloquent->pub_year ;
  
      $book['origin_no']   = $bookEloquent->origin_no ;
      $book['produce_no']   = $bookEloquent->produce_no ;
      $book['btype']   = $bookEloquent->btype ;
      $book['abstract']   = $bookEloquent->abstract ;
  
      $book['b_number']     = 'Not Implement yet';
      $book['cs_number']     = 'Not Implement yet';
      $book['ds_number']     = 'Not Implement yet';
      $book['cd_number']     = 'Not Implement yet';
      $book['dvd_number']     = 'Not Implement yet';
  
      $book['isbn']          = $bookEloquent->isbn ;
      $book['id']            = $bookEloquent->id ;
      $book['grade']         = $bookEloquent->grade ;
  
      $book['bm_status']     = $bookEloquent->bm_status ;
      $book['bm_note']       = $bookEloquent->bm_note ;
      $book['bm_data']       = $bookEloquent->bm_data ;
      $book['setcs_status']  = $bookEloquent->setcs_status ;
      $book['setcs_note']    = $bookEloquent->setcs_note ;
      $book['setcs_data']    = $bookEloquent->setcs_data ;
      $book['setds_status']  = $bookEloquent->setds_status ;
      $book['setds_note']    = $bookEloquent->setds_note ;
      $book['setds_data']    = $bookEloquent->setds_data ;
      $book['setcd_status']  = $bookEloquent->setcd_status ;
      $book['setcd_note']    = $bookEloquent->setcd_note ;
      $book['setcd_data']    = $bookEloquent->setcd_data ;
      $book['setdvd_status'] = $bookEloquent->setdvd_status ;
      $book['setdvd_note']   = $bookEloquent->setdvd_note ;
      $book['setdvd_data']   = $bookEloquent->setdvd_data ;
  
  //braile
      $braille = Braille::where('book_id','=',$book['id'])->get();
  //cassette
      $cassette = Cassette::where('book_id','=',$book['id'])->get();
  //daisy
      $daisy = Daisy::where('book_id','=',$book['id'])->get();
  //cd
      $cd = CD::where('book_id','=',$book['id'])->get();
  //dvd
      $dvd = DVD::where('book_id','=',$book['id'])->get();
  
      $arrOfdata['field']=$field;
      $arrOfdata['book']=$book;
  
      $arrOfdata['braille']=$braille;
      $arrOfdata['cassette']=$cassette;
      $arrOfdata['daisy']=$daisy;
      $arrOfdata['cd']=$cd;
      $arrOfdata['dvd']=$dvd;
      return View::make('library.book.view')->with($arrOfdata);
    }
}
?>
