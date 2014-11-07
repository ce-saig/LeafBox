<?php

// namespace Library;

// use Eloquent;

class Daisy extends Eloquent {
    
    // protected $connection = 'mysql2-library';
    
    protected $table = 'daisy';

    public $timestamps = false;

    public function book()   { return $this->belongsTo('Book'); }
    public function detail()   { return $this->hasMany('Daisydetail'); }
    public function borrow()   { return $this->hasOne('Library\Daisyborrow', 'parent_id'); }
    
    //Relation
    // public function owner()   { return $this->belongsTo('User', 'id'); }
    
}
