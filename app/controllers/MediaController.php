<?php
class MediaController extends Controller{
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

  public function getBraille($bid,$id){
    $braille = Braille::find($id);
    return View::make('library.media.braille')->with(array('item'=>$braille,'bid'=>$bid));

  }

  public function getCassette($bid,$id){
    $book =Book::find($bid);
    $cassette = Cassette::find($id);
    $cassettedetail = Cassettedetail::where('cassette_id','=',$cassette ->id)->get();
    return View::make('library.media.cassette')->with(array('book'=>$book,'item'=>$cassette,'cassettedetail'=>$cassettedetail,'bid'=>$bid));
  }

  public function getDaisy($bid,$id){
    $book =Book::find($bid);
    $daisy = Daisy::find($id);
    $diasydetail = Daisydetail::where('daisy_id','=',$daisy ->id)->get();
    return View::make('library.media.daisy')->with(array('book'=>$book,'item'=>$daisy,'diasydetail'=>$diasydetail,'bid'=>$bid));
  }

  public function getCD($bid,$id){
    $book =Book::find($bid);
    $cd = CD::find($id);
    $cddetail = Cddetail::where('cd_id','=',$cd ->id)->get();
    return View::make('library.media.cd')->with(array('book'=>$book,'item'=>$cd,'cddetail'=>$cddetail,'bid'=>$bid));
  }

  public function getDVD($bid,$id){
    $book =Book::find($bid);
    $dvd = DVD::find($id);
    $dvddetail = Dvddetail::where('dvd_id','=',$dvd ->id)->get();
    return View::make('library.media.dvd')->with(array('book'=>$book,'item'=>$dvd,'dvddetail'=>$dvddetail,'bid'=>$bid));
  }

}