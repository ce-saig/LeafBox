<?php

namespace Library;

use Eloquent;

class Daisydetail extends Eloquent {
    
    protected $connection = 'mysql2-library';
    
    protected $table = 'DAISYDETAIL';
    
    public $timestamps = false;

    public function daisy()   { return $this->belongsTo('Library\Daisy', 'parent_id'); }
    
    //Relation
    // public function owner()   { return $this->belongsTo('User', 'id'); }
    
}