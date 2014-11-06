<?php

// namespace Library;

// use Eloquent;

class DVD extends Eloquent {
    
    // protected $connection = 'mysql2-library';
    
    protected $table = 'dvd';

    public $timestamps = false;

    public function books()   { return $this->belongsTo('Library\Books', 'IBOOK_NO'); }
    public function detail()   { return $this->hasMany('Library\Dvddetail', 'parent_id'); }
    public function borrow()   { return $this->hasOne('Library\Dvdborrow', 'parent_id'); }
    
    //Relation
    // public function owner()   { return $this->belongsTo('User', 'id'); }
    
}