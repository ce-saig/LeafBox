<?php
use Eloquent;

class Cddetail extends Eloquent {
    protected $table = 'cddetail';

    public $timestamps = false;

    public function cd()   { return $this->belongsTo('CD'); }
    
    //Relation
    // public function owner()   { return $this->belongsTo('User', 'id'); }
    
}
