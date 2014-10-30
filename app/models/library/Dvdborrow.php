<?php

namespace Library;

use Eloquent;

class Dvdborrow extends Eloquent {
    
    protected $connection = 'mysql2-library';
    
    protected $table = 'DVDBORROW';

    protected $guarded = array('parent_id');
    
    public $timestamps = false;

    public function dvd()   { return $this->belongsTo('Library\DVD', 'parent_id'); }
    
    //Relation
    // public function owner()   { return $this->belongsTo('User', 'id'); }
    
}