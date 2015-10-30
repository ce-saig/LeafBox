<?php
//use Eloquent;

class Cassette extends Eloquent {
    
    protected $table = 'cassette';

    public $timestamps = false;

    public function book()  { return $this->belongsTo('Book','book_id'); }
    public function detail() { return $this->hasMany('Cassettedetail','cassette_id'); }
    public function borrow() { return $this->hasMany('Cassetteborrow','cassette_id'); }

    public function getFirstSubmediaID() {
    	$cassetteDetail = Cassettedetail::where('cassette_id', '=', $this->id)->get();
        if(isset($cassetteDetail[0]))
    	   return $cassetteDetail[0]->id;
        return 'no media.';
    }

    public function getLastSubmediaID() {
    	$cassetteDetail = Cassettedetail::where('cassette_id', '=', $this->id)->get();
        if(isset($cassetteDetail[0]))
           return $cassetteDetail->last()->id;
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
    $items = Cassette::where('book_id',$bookId)->get();
    foreach ($items as $item) {
      $item->borrow()->delete();
      $item->detail()->delete();
      $item->delete();
    }

    $book = Book::find($bookId);
    $book->setcs_date = date_create('0000-00-00 00:00:00');
    $book->save();
    $book->updateMediaStatus(1);
  }
    
    //Relation
    // public function owner()   { return $this->belongsTo('User', 'id'); }
    
}
