<?php

class Dvdborrow extends Eloquent {
    
    //protected $connection = 'mysql2-library';
    
    protected $table = 'dvdborrow';

    protected $guarded = array('parent_id');
    
    public $timestamps = false;

    public function dvd()   { return $this->belongsTo('DVD', 'dvd_id'); }
    
    //Relation
    // public function owner()   { return $this->belongsTo('User', 'id'); }
    
}