<?php
//use Eloquent;

class Dvddetail extends Eloquent {
    protected $table = 'dvddetail';

    public $timestamps = false;

    public function dvd()   { return $this->belongsTo('dvd','dvd_id'); }
    
    //Relation
    // public function owner()   { return $this->belongsTo('User', 'id'); }
    
}
