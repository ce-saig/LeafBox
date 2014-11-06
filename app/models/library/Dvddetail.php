<?php

namespace Library;

use Eloquent;

class Dvddetail extends Eloquent {
    
    protected $connection = 'mysql2-library';
    
    protected $table = 'DVDDETAIL';

    public $timestamps = false;

    public function dvd()   { return $this->belongsTo('Library\DVD', 'parent_id'); }
    
    //Relation
    // public function owner()   { return $this->belongsTo('User', 'id'); }
    
}