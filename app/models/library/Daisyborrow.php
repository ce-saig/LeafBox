<?php

namespace Library;

use Eloquent;

class Daisyborrow extends Eloquent {
    
    protected $connection = 'mysql2-library';
    
    protected $table = 'DAISYBORROW';
    
    protected $guarded = array('parent_id');
    
    public $timestamps = false;

    public function daisy()   { return $this->belongsTo('Library\Daisy', 'parent_id'); }
    
    //Relation
    // public function owner()   { return $this->belongsTo('User', 'id'); }
    
}