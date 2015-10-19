<?php

// namespace Library;

// use Eloquent;

class CD extends Eloquent {
    
    // protected $connection = 'mysql2-library';
    
    protected $table = 'cd';

    public $timestamps = false;

    public function book()   { return $this->belongsTo('Book','book_id'); }
    public function detail()   { return $this->hasMany('Cddetail','cd_id'); }
    public function borrow()   { return $this->hasMany('Cdborrow','cd_id'); }
    
    public function getFirstSubmediaID() {
    	$cdDetail = Cddetail::where('cd_id', '=', $this->id)->get();
    	if(isset($cdDetail[0]))
           return $cdDetail[0]->id;
        return 'no media.';
    }

    public function getLastSubmediaID() {
    	$cdDetail = Cddetail::where('cd_id', '=', $this->id)->get();
    	if(isset($cdDetail[0]))
           return $cdDetail->last()->id;
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
