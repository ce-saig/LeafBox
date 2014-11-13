<?php

// namespace Library;

// use Eloquent;

class Daisyborrow extends Eloquent {
    
    //protected $connection = 'mysql2-library';
    
    protected $table = 'daisyborrow';
    
    //protected $guarded = array('parent_id');
    
    public $timestamps = false;

    public function daisy()   { return $this->belongsTo('Daisy', 'parent_id'); }
    
    //Relation
    // public function owner()   { return $this->belongsTo('User', 'id'); }
    
}