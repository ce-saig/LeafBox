<?php
class MediaController extends Controller{

  /* Initial */

  public function addBraille($bookId){
    $braille = new Braille();
    
    $braille->book()->associate(Book::find($bookId));
    $braille->produced_date = date('Y-m-d');
    $braille->pages = Input::get('amount');
    $braille->save();
  }

  public function addCassette($bookId){
    $amount = Input::get('amount');
    $cassette = new Cassette();
    $cassette->produced_date = date('Y-m-d');
    $cassette->numpart = $amount;
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
    $daisy = new Daisy();
    $daisy->produced_date = date('Y-m-d');
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
    $cd->produced_date = date('Y-m-d');
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

  /* Getter */

  public function getBraille($bid,$id){
    $braille = Braille::find($id);
    return View::make('library.media.braille')->with(array('item'=>$braille,'bid'=>$bid));

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
    $note = Input::get('note');
    $status = Input::get('status');
    $dvdDetail = Dvddetail::where('dvd_id' ,$dvdId)->first();
    $dvdDetail->status = $status;
    $dvdDetail->notes = $note;
    var_dump($dvdDetail);
    $dvdDetail->save();
    return Redirect::to(url('book/'.$bookId.'#dvd'));
  }

  public function setCassette($bookId,$casseteId){
    $note = Input::get('note');
    $status = Input::get('status');
    $cassetteDetail = Cassettedetail::where('cassette_id' ,$casseteId)->first();
    $cassetteDetail->status = $status;
    $cassetteDetail->notes = $note;
    var_dump($cassetteDetail);
    $cassetteDetail->save();
    return Redirect::to(url('book/'.$bookId.'#cassette'));
  }

  public function setCD($bookId,$cdId){
    $note = Input::get('note');
    $status = Input::get('status');
    $track_fr = Input::get('track_fr');
    $track_to = Input::get('track_to');
    $cdDetail = Cddetail::where('cd_id' ,$cdId)->first();
    $cdDetail->status = $status;
    $cdDetail->notes = $note;
    $cdDetail->track_fr = $track_fr;
    $cdDetail->track_to = $track_to;
    var_dump($cdDetail);
    $cdDetail->save(); 
    return Redirect::to(url('book/'.$bookId.'#cd'));
  }

   public function setDaisy($bookId,$daisyId){
    $note = Input::get('note');
    $status = Input::get('status');
    $daisyDetail = Daisydetail::where('daisy_id' ,$daisyId)->first();
    $daisyDetail->status = $status;
    $daisyDetail->notes = $note;
    var_dump($daisyDetail);
    $daisyDetail->save();
    return Redirect::to(url('book/'.$bookId.'#daisy'));
  }

  public function setBraille($bookId,$brailleId){
    $note = Input::get('note');
    $status = Input::get('status');
    $brailleDetail = Brailledetail::where('braille_id' ,$brailleId)->first();
    $brailleDetail->status = $status;
    $brailleDetail->notes = $note;
    var_dump($brailleDetail);
    $brailleDetail->save();
    return Redirect::to(url('book/'.$bookId.'#braille'));
  }

}