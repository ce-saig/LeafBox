<?php

//namespace Library;

use Eloquent;

class Book extends Eloquent {
    
   // protected $connection = 'mysql2-library';
    
    protected $table = 'book';

    protected $primaryKey = 'id';

    public function braille()   { return $this->hasMany('Braille', 'id'); }
    public function cassette()   { return $this->hasMany('Cassette', 'id'); }
    public function cd()   { return $this->hasMany('Cd', 'id'); }
    public function daisy()   { return $this->hasMany('Daisy', 'id'); }
    public function dvd()   { return $this->hasMany('Dvd', 'id'); }
    
    //Relation
    // public function owner()   { return $this->belongsTo('User', 'id'); }
    
}