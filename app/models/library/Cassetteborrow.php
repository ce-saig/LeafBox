<?php

namespace Library;

use Eloquent;

class Cassetteborrow extends Eloquent {
    
    //protected $connection = 'mysql2-library';
    
    protected $table = 'CASSETTEBORROW';

    protected $guarded = array('parent_id');

    public $timestamps = false;

    public function cassette()   { return $this->belongsTo('Library\Cassette', 'parent_id'); }

}