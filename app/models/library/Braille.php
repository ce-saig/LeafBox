<?php

namespace Library;

use Eloquent;

class Braille extends Eloquent {
    
    protected $connection = 'mysql2-library';
    
    protected $table = 'BRAILLE';

    public $timestamps = false;

    public function books()   { return $this->belongsTo('Library\Books', 'IBOOK_NO'); }
    public function borrow()   { return $this->hasOne('Library\Brailleborrow', 'parent_id'); }
    
    //Relation
    // public function owner()   { return $this->belongsTo('User', 'id'); }
    
}