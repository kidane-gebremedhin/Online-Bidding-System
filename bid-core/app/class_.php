<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class class_ extends Model
{
   protected $table="class";

  	public function createdByUser(){
    	return $this->belongsTo('App\User', 'createdByUserId', 'id');
    }
  	public function updatedByUser(){
    	return $this->belongsTo('App\User', 'updatedByUserId', 'id');
    }
}
