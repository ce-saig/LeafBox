<?php
//use Eloquent;

class BookProd extends Eloquent {

    protected $table = 'bookProd';
    public $timestamps = false;

    public function book()   { return $this->belongsTo('Book','book_id'); }
    public function user()   { return $this->belongsTo('User','user_id'); }

}
