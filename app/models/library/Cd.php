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
    
    //Relation
    // public function owner()   { return $this->belongsTo('User', 'id'); }
    
}
