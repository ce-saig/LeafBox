<?php
//use Eloquent;

class Brailleborrow extends Eloquent {

    //protected $connection = 'mysql2-library';

    protected $table = 'brailleborrow';

    //protected $guarded = array('parent_id');

    public $timestamps = false;

    public function braille()   { return $this->belongsTo('Braille', 'braille_id'); }

}
