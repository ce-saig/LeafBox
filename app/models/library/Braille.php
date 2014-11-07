<?php
//use Eloquent;

class Braille extends Eloquent {
    
    protected $table = 'braille';

    public $timestamps = false;

    public function book()   { return $this->belongsTo('Book');}
    public function borrow()   { return $this->hasOne('Brailleborrow', 'brail_id'); }
    
    //Relation
    // public function owner()   { return $this->belongsTo('User', 'id'); }
    
}
