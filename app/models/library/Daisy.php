<?php

// namespace Library;

// use Eloquent;

class Daisy extends Eloquent {
    
    // protected $connection = 'mysql2-library';
    
    protected $table = 'daisy';

    public $timestamps = false;

    public function books()   { return $this->belongsTo('Library\Books', 'IBOOK_NO'); }
    public function detail()   { return $this->hasMany('Library\Daisydetail', 'parent_id'); }
    public function borrow()   { return $this->hasOne('Library\Daisyborrow', 'parent_id'); }
    
    //Relation
    // public function owner()   { return $this->belongsTo('User', 'id'); }
    
}