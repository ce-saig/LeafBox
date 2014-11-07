<?php

use Eloquent;

class Cassettedetail extends Eloquent {
    
    protected $table = 'cassettedetail';

    public $timestamps = false;

    public function cassette()   { return $this->belongsTo('Cassette'); }
    
    //Relation
    // public function owner()   { return $this->belongsTo('User', 'id'); }
    
}
