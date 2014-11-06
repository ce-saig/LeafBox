<?php

//namespace Library;

//use Eloquent;

class Braille extends Eloquent {
    
    //protected $connection = 'mysql2-library';
    
    protected $table = 'braille';

    public $timestamps = false;

    public function books()   { return $this->belongsTo('Books', 'book_id'); }
    public function borrow()   { return $this->hasOne('Brailleborrow', 'braille_id'); }
    
    //Relation
    // public function owner()   { return $this->belongsTo('User', 'id'); }
    
}