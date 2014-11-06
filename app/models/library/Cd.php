<?php

namespace Library;

use Eloquent;

class Cd extends Eloquent {
    
    protected $connection = 'mysql2-library';
    
    protected $table = 'CD';

    public $timestamps = false;

    public function books()   { return $this->belongsTo('Library\Books', 'IBOOK_NO'); }
    public function detail()   { return $this->hasMany('Library\Cddetail', 'parent_id'); }
    public function borrow()   { return $this->hasOne('Library\Cdborrow', 'parent_id'); }
    
    //Relation
    // public function owner()   { return $this->belongsTo('User', 'id'); }
    
}