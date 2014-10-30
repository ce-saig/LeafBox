<?php

namespace Library;

use Eloquent;

class Books extends Eloquent {
    
    protected $connection = 'mysql2-library';
    
    protected $table = 'BOOK';

    protected $primaryKey = 'IBOOK_NO';

    public function braille()   { return $this->hasMany('Library\Braille', 'IBOOK_NO'); }
    public function cassette()   { return $this->hasMany('Library\Cassette', 'IBOOK_NO'); }
    public function cd()   { return $this->hasMany('Library\Cd', 'IBOOK_NO'); }
    public function daisy()   { return $this->hasMany('Library\Daisy', 'IBOOK_NO'); }
    public function dvd()   { return $this->hasMany('Library\Dvd', 'IBOOK_NO'); }
    
    //Relation
    // public function owner()   { return $this->belongsTo('User', 'id'); }
    
}