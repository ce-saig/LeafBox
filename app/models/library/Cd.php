<?php

// namespace Library;

// use Eloquent;

class Cd extends Eloquent {
    
    // protected $connection = 'mysql2-library';
    
    protected $table = 'cd';

    public $timestamps = false;

    public function book()   { return $this->belongsTo('Book'); }
    public function detail()   { return $this->hasMany('Cddetail'); }
    public function borrow()   { return $this->hasOne('Cdborrow'); }
    
    //Relation
    // public function owner()   { return $this->belongsTo('User', 'id'); }
    
}
