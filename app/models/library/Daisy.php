<?php

// namespace Library;

// use Eloquent;

class Daisy extends Eloquent {
    
    // protected $connection = 'mysql2-library';
    
    protected $table = 'daisy';

    public $timestamps = false;

    public function book()   { return $this->belongsTo('Book','book_id'); }
    public function detail()   { return $this->hasMany('Daisydetail','daisy_id'); }
    public function borrow()   { return $this->hasMany('Daisyborrow','daisy_id'); }

    public function getFirstSubmediaID() {
    	$daisyDetail = Daisydetail::where('daisy_id', '=', $this->id)->get();
    	if(isset($daisyDetail[0]))
           return $daisyDetail[0]->id;
        return 'no media.';
    }

    public function getLastSubmediaID() {
    	$daisyDetail = Daisydetail::where('daisy_id', '=', $this->id)->get();
    	if(isset($daisyDetail[0]))
           return $daisyDetail->last()->id;
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
    
    //Relation
    // public function owner()   { return $this->belongsTo('User', 'id'); }
    
}
