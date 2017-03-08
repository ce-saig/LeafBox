<?php

// namespace Library;

// use Eloquent;

class DVD extends Eloquent {
    
    // protected $connection = 'mysql2-library';
    
    protected $table = 'dvd';

    public $timestamps = false;

    public function book()   { return $this->belongsTo('Book'); }
    public function detail()   { return $this->hasMany('Dvddetail','dvd_id'); }
    public function borrow()   { return $this->hasMany('Dvdborrow','dvd_id'); }
    
    public function getFirstSubmediaID() {
    	$dvdDetail = Dvddetail::where('dvd_id', '=', $this->id)->get();
    	if(isset($dvdDetail[0]))
           return $dvdDetail[0]->id;
        return 'no media.';
    }

    public function getLastSubmediaID() {
    	$dvdDetail = Dvddetail::where('dvd_id', '=', $this->id)->get();
    	if(isset($dvdDetail[0]))
           return $dvdDetail->last()->id;
        return 'no media.';
    }

    public function getSubmediaRangeID() {
        if($this->getFirstSubmediaID() == 'no media.')
            return;
    	$range = 'id('.$this->getFirstSubmediaID();
    	if($this->numpart > 1)
    		$range .= ' - '.$this->getLastSubmediaID();
    	$range .= ')';
		if($this->getLastSubmediaID() - $this->getFirstSubmediaID() != ($this->numpart - 1))
			$range .= '*';
		return $range;
    }

    public static function removeAll($bookId){

    $dvds = DVD::where('book_id',$bookId)->get();
    foreach ($dvds as $item) {
      $item->borrow()->delete();
      $item->detail()->delete();
      $item->delete();
    }

    $book = Book::find($bookId);
    $book->setdvd_date = date_create('0000-00-00 00:00:00');
    $book->save();
    $book->updateMediaStatus(4);
  }
    //Relation
    // public function owner()   { return $this->belongsTo('User', 'id'); }
    
}
