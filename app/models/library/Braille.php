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
}
