<?php
//use Eloquent;

class Brailleborrow extends Eloquent {
    
    //protected $connection = 'mysql2-library';
    
    protected $table = 'brailleborrow';

    protected $guarded = array('parent_id');

    public $timestamps = false;

    public function cassette()   { return $this->belongsTo('Library\Braille', 'parent_id'); }

}
