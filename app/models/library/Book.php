<?php

//namespace Library;

//use Eloquent;

class Book extends Eloquent {
    
   // protected $connection = 'mysql2-library';
    
    protected $table = 'book';

    protected $primaryKey = 'id';

    public function braille()   { return $this->hasMany('Braille', 'book_id'); }
    public function cassette()   { return $this->hasMany('Cassette', 'book_id'); }
    public function cd()   { return $this->hasMany('Cd', 'book_id'); }
    public function daisy()   { return $this->hasMany('Daisy', 'book_id'); }
    public function dvd()   { return $this->hasMany('Dvd', 'book_id'); }
    
    //Relation
    // public function owner()   { return $this->belongsTo('User', 'id'); }
    
}
