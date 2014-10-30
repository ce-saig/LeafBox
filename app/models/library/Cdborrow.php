<?php

namespace Library;

use Eloquent;

class Cdborrow extends Eloquent {
    
    protected $connection = 'mysql2-library';
    
    protected $table = 'CDBORROW';

    protected $guarded = array('parent_id');

    public $timestamps = false;

    public function cd()   { return $this->belongsTo('Library\Cd', 'parent_id'); }
    
    //Relation
    // public function owner()   { return $this->belongsTo('User', 'id'); }
    
}