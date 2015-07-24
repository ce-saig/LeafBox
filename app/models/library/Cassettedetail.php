<?php

//use Eloquent;

class Cassettedetail extends Eloquent {
    
    protected $table = 'cassettedetail';

    public $timestamps = false;

    public function cassette()   { return $this->belongsTo('Cassette','Cassette_id'); }
    
    //Relation
    // public function owner()   { return $this->belongsTo('User', 'id'); }
    
}
