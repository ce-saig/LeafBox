<?php
//use Eloquent;

class Braille extends Eloquent {

    protected $table = 'braille';
    public $timestamps = false;

    public function book()   { return $this->belongsTo('Book','book_id');}
    public function borrow()   { return $this->hasMany('Brailleborrow','braille_id'); }

    public function getStatus()
    {
      $status_enum = array('ผลิต', 'รอผลิต', 'ไม่ผลิต', 'จองอ่าน');
      $index = (int)($this->status);
      return $status_enum[$index];
    }

}
