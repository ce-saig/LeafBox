<?php

class Cddetail extends Eloquent {
    protected $table = 'cddetail';

    public $timestamps = false;

    public function cd()   { return $this->belongsTo('Cd','cd_id'); }
    
    //Relation
    // public function owner()   { return $this->belongsTo('User', 'id'); }
    
}
