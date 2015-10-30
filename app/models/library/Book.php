<?php

//namespace Library;

//use Eloquent;

class Book extends Eloquent {

   // protected $connection = 'mysql2-library';

    protected $table = 'book';

    protected $primaryKey = 'id';

    public function prod()   { return $this->hasMany('BookProd', 'book_id'); }

    public function braille()   { return $this->hasMany('Braille', 'book_id'); }
    public function cassette()   { return $this->hasMany('Cassette', 'book_id'); }
    public function cd()   { return $this->hasMany('CD', 'book_id'); }
    public function daisy()   { return $this->hasMany('Daisy', 'book_id'); }
    public function dvd()   { return $this->hasMany('DVD', 'book_id'); }

    private function getDefinedMediaNumber($media_type)
    {
        $media_type = strtolower($media_type);
        switch ($media_type) {
            case 'braille' | 0:
            return 0;
            case 'cassette' | 1:
            return 1;
            case 'daisy' | 2:
            return 2;
            case 'cd' | 3:
            return 3;
            case 'dvd' | 4:
            return 4;
            default:
            return 5;
        }
    }

    public static function getDefinedMediaWord($media_num)
    {
        $word = array('braille', 'cassette', 'daisy', 'cd', 'dvd', 'undefined');
        if($media_num > 4 || $media_num < 0) {
            $media_num = 5;
        }
        return $word[$media_num];
    }

    public function getLastProdStatus($media_type)
    {
        $media_type = $this->getDefinedMediaNumber($media_type);
        $lastProd = BookProd::where('book_id', '=', $this->id)
        ->where('media_type', '=', $media_type)->get();

        if(count($lastProd) == 0)
            return array('action_status' => -1, 'finish_date' => 1);
        $lastProd = $lastProd->last();
        return array('action_status' => $lastProd->action, 'finish_date' => $lastProd->finish_date);
    }

    public function updateMediaStatus($media_type)
    {
        $media_type = $this->getDefinedMediaNumber($media_type);
        $status = $this->getLastProdStatus($media_type)['action_status'];
        $mediaStatus = null;
        if($status == -1)
            $mediaStatus = 0;
        else if($status == 0)
            $mediaStatus = 2;
        else
            $mediaStatus = 3;

        if($mediaStatus == 3 && $this->countMedia($media_type))
            $mediaStatus = 1;

        switch ($media_type) {
            case 0:
            $this->bm_status = $mediaStatus;
            break;
            case 1:
            $this->setcs_status = $mediaStatus;
            break;
            case 2:
            $this->setds_status = $mediaStatus;
            break;
            case 3:
            $this->setcd_status = $mediaStatus;
            break;
            case 4:
            $this->setdvd_status = $mediaStatus;
            break;
            default :
            return 'media not match';
        }
        $this->save();
        return $mediaStatus;
    }

    public function countMedia($media_type)
    {
        $media_type = (is_numeric($media_type)) ? $media_type : $this->getDefinedMediaNumber($media_type);
        if($media_type == 0)
            return count($this->braille()->get());
        else if($media_type == 1)
            return count($this->cassette()->get());
        else if($media_type == 2)
            return count($this->daisy()->get());
        else if($media_type == 3)
            return count($this->cd()->get());
        else
            return 1;
    }

    public function removeAllMedia()
    {
        Braille::removeAll($this->id);
        Cassette::removeAll($this->id);
        CD::removeAll($this->id);
        Daisy::removeAll($this->id);
        DVD::removeAll($this->id);
    }

    public function removeAllProd()
    {
        $prods = $this->prod()->get();
        foreach ($prods as $key => $item) {
            $item->delete();
        }
    }
    //Relation
    // public function owner()   { return $this->belongsTo('User', 'id'); }
}
