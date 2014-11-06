<?php

/*namespace Library;

use Eloquent;*/

class Cassette extends Eloquent {
    
    //protected $connection = 'mysql2-library';
    
    protected $table = 'cassette';

    public $timestamps = false;

    public function books()   { return $this->belongsTo('Library\Books', 'IBOOK_NO'); }
    public function detail()   { return $this->hasMany('Library\Cassettedetail', 'parent_id'); }
    public function borrow()   { return $this->hasOne('Library\Cassetteborrow', 'parent_id'); }
    
    //Relation
    // public function owner()   { return $this->belongsTo('User', 'id'); }
    
}