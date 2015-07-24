<?php
//use Eloquent;

class Cassette extends Eloquent {
    
    protected $table = 'cassette';

    public $timestamps = false;

    public function book()  { return $this->belongsTo('Book','book_id'); }
    public function detail() { return $this->hasMany('Cassettedetail','cassette_id'); }
    public function borrow() { return $this->hasMany('Cassetteborrow','cassette_id'); }
    
    //Relation
    // public function owner()   { return $this->belongsTo('User', 'id'); }
    
}
