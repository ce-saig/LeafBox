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
    
    //Relation
    // public function owner()   { return $this->belongsTo('User', 'id'); }
    
}
