<?php
use Eloquent;

class Cassette extends Eloquent {
    
    protected $table = 'cassette';

    public $timestamps = false;

    public function book()  { return $this->belongsTo('Book'); }
    public function cassetteDetail() { return $this->hasMany('Cassettedetail'); }
    public function borrow() { return $this->hasOne('Library\Cassetteborrow', 'parent_id'); }
    
    //Relation
    // public function owner()   { return $this->belongsTo('User', 'id'); }
    
}
