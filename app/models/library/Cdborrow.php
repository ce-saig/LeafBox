<?php


class Cdborrow extends Eloquent {
    
    //protected $connection = 'mysql2-library';
    
    protected $table = 'cdborrow';

    //protected $guarded = array('parent_id');

    public $timestamps = false;

    public function cd()   { return $this->belongsTo('Cd','cd_id'); }
    
    //Relation
    // public function owner()   { return $this->belongsTo('User', 'id'); }
    
}