<?php
class BookController extends Controller{
  public function newBook(){
    return View::make('newBook');
  }
  public function postBook(){
    $Book = new Book;
    $Book->isbn = Input::get('isbn');
    $Book->title = Input::get('title');
    $Book->author = Input::get('author');
    $Book->save();
    return Redirect::to('add');
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

    $arrOfdata['book']=$book;
    $arrOfdata['field']=$field;
    return View::make('library.book.index')
    ->with($arrOfdata);
  }
}

/*
เรื่อง
ผู้แต่ง
ผู้แปล
ประเภทหนังสือ
สำนักพิมพ์
พิมพ์ครั้งที่
วันลงทะเบียน
ทะเบียนการผลิต
ทะเบียนหนังสือฉบับตาดีเลขที่
หนังสือ CD
เลขที่ CD
หนังสือเทป
CM เลขที่
สถานะหนังสือ
วันที่หนังสือ
บันทึกเกี่ยวหับหนังสือ
สถานะเทป
วันที่เทป
บันทึกเกี่ยวกับเทป
สถานะ CD
วันที่ CD
บันทึกเกี่ยวกับ CD
สถานะ DVD
วันที่ DVD
บันทึกเกี่ยวกับ DVD
*/