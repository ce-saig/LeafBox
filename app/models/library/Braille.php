<?php

use Eloquent;

class Braille extends Eloquent {
    
    //protected $connection = 'mysql2-library';
    
    protected $table = 'braille';

    public $timestamps = false;

<<<<<<< HEAD
    public function book()   { return $this->belongsTo('Book'); }
    public function borrow()   { return $this->hasOne('Brailleborrow', 'brail_id'); }
=======
    public function books()   { return $this->belongsTo('Books', 'book_id'); }
    public function borrow()   { return $this->hasOne('Brailleborrow', 'braille_id'); }
>>>>>>> 9dce3816b65672a12604134749227a79732b5780
    
    //Relation
    // public function owner()   { return $this->belongsTo('User', 'id'); }
    
}
