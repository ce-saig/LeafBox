<?php

class Brailledetail extends Eloquent {
  protected $table = 'brailledetail';

  public $timestamps = false;

  public function braille()   { return $this->belongsTo('Braille','braille_id'); }
}
