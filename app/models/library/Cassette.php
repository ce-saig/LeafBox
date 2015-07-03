<?php
//use Eloquent;

class Cassette extends Eloquent {
    
    protected $table = 'cassette';

    public $timestamps = false;

    public function book()  { return $this->belongsTo('Book'); }
    public function detail() { return $this->hasMany('Cassettedetail'); }
    public function borrow() { return $this->hasOne('Cassetteborrow'); }
    
    //Relation
    // public function owner()   { return $this->belongsTo('User', 'id'); }
    
}
