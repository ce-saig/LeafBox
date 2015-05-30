<?php

class Cassetteborrow extends Eloquent {
    
    //protected $connection = 'mysql2-library';
    
    protected $table = 'cassetteborrow';

    protected $guarded = array('parent_id');

    public $timestamps = false;

    public function cassette()   { return $this->belongsTo('Library\Cassette', 'parent_id'); }

}