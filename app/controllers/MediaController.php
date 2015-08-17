<?php
class MediaController extends Controller{

  /* Initial */

  public function addBraille($bookId){
    $braille = new Braille();
    $book = Book::find($bookId);

    $amount = count(Braille::where('book_id', $bookId)->get());
    if(!$amount)
      $book->bm_date = (date("Y") + 543).date("-m-d H:i:s");

    $book->bm_status = "ผลิต";
    $book->save();

    $braille->book()->associate(Book::find($bookId));
    $braille->produced_date = (date("Y") + 543).date("-m-d H:i:s");
    $braille->status = 0; // 0 normal,1 broken,2 wait for repeir
    $braille->pages = Input::get('amount');
    $braille->numpart = Input::get('part');
    $braille->examiner = Input::get('examiner');
    $braille->save();
  }

  public function addCassette($bookId){
    $book = Book::find($bookId);

    $amount = count(Cassette::where('book_id', $bookId)->get());
    if(!$amount)
      $book->setcs_date = (date("Y") + 543).date("-m-d H:i:s");

    $book->setcs_status = "ผลิต";
    $book->save();

    $amount = Input::get('amount');
    $cassette = new Cassette();
    $cassette->produced_date = (date("Y") + 543).date("-m-d H:i:s");
    $cassette->numpart = $amount;
    $cassette->book()->associate(Book::find($bookId));
    $cassette->save();

    for($i=1; $i<=$amount; $i++){
      $cassetteDetail = new Cassettedetail();
      $cassetteDetail->part = $i;
      $cassetteDetail->status = 0;
      $cassetteDetail->cassette()->associate($cassette);
      $cassetteDetail->save();
    }
  }

  public function addDaisy($bookId){
    $book = Book::find($bookId);

    $amount = count(Daisy::where('book_id', $bookId)->get());
    if(!$amount)
      $book->setds_date = (date("Y") + 543).date("-m-d H:i:s");

    $book->setds_status = "ผลิต";
    $book->save();

    $amount = Input::get('amount');
    $daisy = new Daisy();
    $daisy->produced_date = (date("Y") + 543).date("-m-d H:i:s");
    $daisy->numpart = $amount;
    $daisy->book()->associate(Book::find($bookId));
    $daisy->save();

    for($i=1; $i<=$amount; $i++){
      $daisydetail = new Daisydetail();
      $daisydetail->part = $i;
      $daisydetail->status = 0;
      $daisydetail->daisy()->associate($daisy);
      $daisydetail->save();
    }
  }

  public function addCD($bookId){
    $book = Book::find($bookId);

    $amount = count(CD::where('book_id', $bookId)->get());
    if(!$amount)
      $book->setcd_date = (date("Y") + 543).date("-m-d H:i:s");

    $book->setcd_status = "ผลิต";
    $book->save();

    $amount = Input::get('amount');
    $cd = new CD();
    $cd->produced_date = (date("Y") + 543).date("-m-d H:i:s");
    $cd->book()->associate(Book::find($bookId));
    $cd->numpart = $amount;
    $cd->save();

    for($i=1; $i<=$amount; $i++){
      $cddetail = new Cddetail();
      $cddetail->part = $i;
      $cddetail->status = 0;
      $cddetail->cd()->associate($cd);
      $cddetail->save();
    }
  }

  public function addDVD($bookId){
    $book = Book::find($bookId);

    $amount = count(DVD::where('book_id', $bookId)->get());
    if(!$amount)
      $book->setdvd_date = (date("Y") + 543).date("-m-d H:i:s");

    $book->setdvd_status = "ผลิต";
    $book->save();

    $amount = Input::get('amount');
    $dvd = new DVD();
    $dvd->produced_date = (date("Y") + 543).date("-m-d H:i:s");
    $dvd->book()->associate(Book::find($bookId));
    $dvd->numpart = $amount;
    $dvd->save();

    for($i=1; $i<=$amount; $i++){
      $dvddetail = new Dvddetail();
      $dvddetail->part = $i;
      $dvddetail->status = 0;
      $dvddetail->dvd()->associate($dvd);
      $dvddetail->save();
    }
  }

  /* Getter */

  public function getBraille($bid,$id){
    $book =Book::find($bid);
    $braille = Braille::find($id);
    return View::make('library.media.braille')->with(array('book'=>$book,'item'=>$braille,'bid'=>$bid));
  }

  public function getCassette($bid,$id){
    $book =Book::find($bid);
    $cassette = Cassette::find($id);
    $cassettedetail = Cassettedetail::where('cassette_id','=',$cassette ->id)->get();
    return View::make('library.media.cassette')->with(array('book'=>$book,'item'=>$cassette,'detail'=>$cassettedetail,'bid'=>$bid));
  }

  public function getDaisy($bid,$id){
    $book =Book::find($bid);
    $daisy = Daisy::find($id);
    $diasydetail = Daisydetail::where('daisy_id','=',$daisy ->id)->get();
    return View::make('library.media.daisy')->with(array('book'=>$book,'item'=>$daisy,'detail'=>$diasydetail,'bid'=>$bid));
  }

  public function getCD($bid,$id){
    $book =Book::find($bid);
    $cd = CD::find($id);
    $cddetail = Cddetail::where('cd_id','=',$cd ->id)->get();
    return View::make('library.media.cd')->with(array('book'=>$book,'item'=>$cd,'detail'=>$cddetail,'bid'=>$bid));
  }

  public function getDVD($bid,$id){
    $book =Book::find($bid);
    $dvd = DVD::find($id);
    $dvddetail = Dvddetail::where('dvd_id','=',$dvd ->id)->get();
    return View::make('library.media.dvd')->with(array('book'=>$book,'item'=>$dvd,'detail'=>$dvddetail,'bid'=>$bid));
  }

  /* Setter */

  public function setDVD($bookId,$dvdId){
    $input = Input::all();
    $dvdDetail = Dvddetail::where('dvd_id' ,$dvdId)->get();
    $i = 0;

    foreach($dvdDetail as $details) {
      $details->status = $input['status'][$i];
      $details->notes = $input['note'][$i++];
      $details->save();
    }

    return Redirect::to(url('book/'.$bookId.'#dvd'));
  }

  public function setCassette($bookId,$casseteId){
    $input = Input::all();
    $cassetteDetail = Cassettedetail::where('cassette_id' ,$casseteId)->get();
    $i = 0;

    foreach($cassetteDetail as $details) {
      $details->status = $input['status'][$i];
      $details->notes = $input['note'][$i++];
      $details->save();
    }

    return Redirect::to(url('book/'.$bookId.'#cassette'));
  }

  public function setCD($bookId,$cdId){
    $input = Input::all();
    $cdDetail = Cddetail::where('cd_id' ,$cdId)->get();
    $i = 0;

    foreach($cdDetail as $details) {
      $details->status = $input['status'][$i];
      $details->notes = $input['note'][$i];
      $details->track_fr = $input['track_fr'][$i];
      $details->track_to = $input['track_to'][$i++];
      $details->save();
    }
    return Redirect::to(url('book/'.$bookId.'#cd'));
  }

   public function setDaisy($bookId,$daisyId){
    $input = Input::all();
    $daisyDetail = Daisydetail::where('daisy_id' ,$daisyId)->get();
     $i = 0;

    foreach($daisyDetail as $details) {
      $details->status = $input['status'][$i];
      $details->notes = $input['note'][$i];
      $details->track_fr = $input['track_fr'][$i];
      $details->track_to = $input['track_to'][$i++];
      $details->save();
    }

    return Redirect::to(url('book/'.$bookId.'#daisy'));
  }

  public function setBraille($bookId,$brailleId){
    $input = Input::all();
    $braille = Braille::where('id', $brailleId)->first();
    $braille->status = $input['status'];
    $braille->notes = $input['notes'];
    $braille->save();
    return Redirect::to(url('book/'.$bookId.'#braille'));
  }

  public function removeAllDvd($bookId){

    $dvds = DVD::where('book_id',$bookId)->get();
    foreach ($dvds as $dvd) {
      $dvd->detail()->delete();
      $dvd->delete();
    }

    $book = Book::find($bookId);
    $book->setdvd_status = "ไม่ผลิต";
    $book->setdvd_date = date_create("0000-00-00 00:00:00");
    $book->save();
    return Redirect::to(url('book/'.$bookId.'#dvd'));
  }

  public function removeAllCd($bookId){

    $cds = CD::where('book_id',$bookId)->get();
    foreach ($cds as $cd) {
      $cd->detail()->delete();
      $cd->delete();
    }

    $book = Book::find($bookId);
    $book->setcd_status = "ไม่ผลิต";
    $book->setcd_date = date_create("0000-00-00 00:00:00");
    $book->save();
    return Redirect::to(url('book/'.$bookId.'#cd'));
  }

  public function removeAllDaisy($bookId){

    $daisys = Daisy::where('book_id',$bookId)->get();
    foreach ($daisys as $daisy) {
      $daisy->detail()->delete();
      $daisy->delete();
    }

    $book = Book::find($bookId);
    $book->setds_status = "ไม่ผลิต";
    $book->setds_date = date_create("0000-00-00 00:00:00");
    $book->save();
    return Redirect::to(url('book/'.$bookId.'#daisy'));
  }

  public function removeAllCassette($bookId){
    $items = Cassette::where('book_id',$bookId)->get();
    foreach ($items as $item) {
      $item->detail()->delete();
      $item->delete();
    }

    $book = Book::find($bookId);
    $book->setcs_status = "ไม่ผลิต";
    $book->setcs_date = date_create("0000-00-00 00:00:00");
    $book->save();
    return Redirect::to(url('book/'.$bookId.'#cassette'));
  }

  public function removeAllBraille($bookId){
    $items = Braille::where('book_id',$bookId)->get();
    foreach ($items as $item)
      $item->delete();

    $book = Book::find($bookId);
    $book->bm_status = "ไม่ผลิต";
    $book->bm_date = date_create("0000-00-00 00:00:00");
    $book->save();
    return Redirect::to(url('book/'.$bookId.'#braille'));
  }

   public function removeSelectedCassette($bookId,$cassetteId){
    $item = Cassette::find($cassetteId);
    $item->detail()->delete();
    $item->delete();

    if(!count(Cassette::where('book_id',$bookId)->get())) {
      $book = Book::find($bookId);
      $book->setcs_status = "ไม่ผลิต";
      $book->setcs_date = date_create("0000-00-00 00:00:00");
      $book->save();
    }
    return Redirect::to(url('book/'.$bookId.'#cassette'));
  }

  public function removeSelectedCd($bookId,$cdId){
    $item = CD::find($cdId);
    $item->detail()->delete();
    $item->delete();

    if(!count(CD::where('book_id',$bookId)->get())) {
      $book = Book::find($bookId);
      $book->setcd_status = "ไม่ผลิต";
      $book->setcd_date = date_create("0000-00-00 00:00:00");
      $book->save();
    }
    return Redirect::to(url('book/'.$bookId.'#cd'));
  }
  public function removeSelectedDvd($bookId,$dvdId){
    $item = DVD::find($dvdId);
    $item->detail()->delete();
    $item->delete();

    if(!count(DVD::where('book_id',$bookId)->get())) {
      $book = Book::find($bookId);
      $book->setdvd_status = "ไม่ผลิต";
      $book->setdvd_date = date_create("0000-00-00 00:00:00");
      $book->save();
    }
    return Redirect::to(url('book/'.$bookId.'#dvd'));
  }
  public function removeSelectedBraille($bookId,$brailleId){
    $item = Braille::find($brailleId);
    $item->delete();

    if(!count(Braille::where('book_id',$bookId)->get())) {
      $book = Book::find($bookId);
      $book->bm_status = "ไม่ผลิต";
      $book->bm_date = date_create("0000-00-00 00:00:00");
      $book->save();
    }
    return Redirect::to(url('book/'.$bookId.'#braille'));
  }

  public function removeSelectedDaisy($bookId,$daisyId){
    $item = Daisy::find($daisyId);
    $item->detail()->delete();
    $item->delete();

    if(!count(Daisy::where('book_id',$bookId)->get())) {
      $book = Book::find($bookId);
      $book->setds_status = "ไม่ผลิต";
      $book->setds_date = date_create("0000-00-00 00:00:00");
      $book->save();
    }
    return Redirect::to(url('book/'.$bookId.'#daisy'));
  }
}
