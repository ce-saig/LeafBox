<?php
//use Eloquent;

class Braille extends Eloquent {

    protected $table = 'braille';
    public $timestamps = false;

    public function book()   { return $this->belongsTo('Book','book_id');}
    public function detail() { return $this->hasMany('Brailledetail','braille_id'); }
    public function borrow()   { return $this->hasMany('Brailleborrow','braille_id'); }

    public function getFirstSubmediaID() {
    	$brailleDetail = Brailledetail::where('braille_id', '=', $this->id)->get();
        if(isset($brailleDetail[0]))
            return $brailleDetail[0]->id;
        return 'no media.';
    }

    public function getLastSubmediaID() {
    	$brailleDetail = Brailledetail::where('braille_id', '=', $this->id)->get();
        if(isset($brailleDetail[0]))
            return $brailleDetail->last()->id;
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
    $items = Braille::where('book_id',$bookId)->get();
    foreach ($items as $item) {
      $item->borrow()->delete();
      $item->detail()->delete();
      $item->delete();
    }

    $book = Book::find($bookId);
    $book->bm_date = date_create('0000-00-00 00:00:00');
    $book->save();
    $book->updateMediaStatus(0);
  }
}
