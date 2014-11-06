<?php

namespace Library;

use Eloquent;

class Cddetail extends Eloquent {
    
    protected $connection = 'mysql2-library';
    
    protected $table = 'CDDETAIL';

    public $timestamps = false;

    public function cd()   { return $this->belongsTo('Library\Cd', 'parent_id'); }
    
    //Relation
    // public function owner()   { return $this->belongsTo('User', 'id'); }
    
}