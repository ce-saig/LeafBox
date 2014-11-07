<?php

//namespace Library;

use Eloquent;

class Book extends Eloquent {
    
   // protected $connection = 'mysql2-library';
    
    protected $table = 'book';

    protected $primaryKey = 'id';

    public function braille()   { return $this->hasMany('Library\Braille', 'id'); }
    public function cassette()   { return $this->hasMany('Library\Cassette', 'id'); }
    public function cd()   { return $this->hasMany('Library\Cd', 'id'); }
    public function daisy()   { return $this->hasMany('Library\Daisy', 'id'); }
    public function dvd()   { return $this->hasMany('Library\Dvd', 'id'); }
    
    //Relation
    // public function owner()   { return $this->belongsTo('User', 'id'); }
    
}