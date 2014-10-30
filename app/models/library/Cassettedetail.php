<?php

namespace Library;

use Eloquent;

class Cassettedetail extends Eloquent {
    
    protected $connection = 'mysql2-library';
    
    protected $table = 'CASSETTEDETAIL';

    public $timestamps = false;

    public function cassette()   { return $this->belongsTo('Library\Cassette', 'parent_id'); }
    
    //Relation
    // public function owner()   { return $this->belongsTo('User', 'id'); }
    
}