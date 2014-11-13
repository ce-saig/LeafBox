<?php
class MediaController extends Controller{
  public function addBraille($bookId){
    $braille = new Braille();
    
    $braille->book()->associate(Book::find($bookId));
    $braille->produced_date = date('Y-m-d');
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

  public function getBraille($bid,$id){
    $braille = Braille::find($id);
    return View::make('library.media.braille')->with(array('item'=>$braille,'bid'=>$bid));
  }

  public function getCassette($bid,$id){
    $cassette = Cassette::find($id);
    return View::make('library.media.cassette')->with(array('item'=>$cassette,'bid'=>$bid));
  }

  public function getDaisy($bid,$id){
    $daisy = Daisy::find($id);
    return View::make('library.media.daisy')->with(array('item'=>$daisy,'bid'=>$bid));
  }

  public function getCD($bid,$id){
    $cd = CD::find($id);
    return View::make('library.media.cd')->with(array('item'=>$cd,'bid'=>$bid));
  }

  public function getDVD($bid,$id){
    $dvd = DVD::find($id);
    return View::make('library.media.dvd')->with(array('item'=>$dvd,'bid'=>$bid));
  }

}