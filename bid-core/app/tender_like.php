<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tender_like extends Model
{
   protected $table="tender_likes";


    public function tender(){
        return $this->belongsTo('App\tender', 'tenderId', 'id');
    }
    public function likedByUser(){
        return $this->belongsTo('App\user', 'userId', 'id');
    }
}
