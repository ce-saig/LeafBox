<?php
//use Eloquent;

class Braille extends Eloquent {

    protected $table = 'braille';
    public $timestamps = false;

    public function book()   { return $this->belongsTo('Book','book_id');}
    public function borrow()   { return $this->hasMany('Brailleborrow','braille_id'); }

}
