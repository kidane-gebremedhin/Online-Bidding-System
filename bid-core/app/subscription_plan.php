<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subscription_plan extends Model
{
   protected $table="subscription_plan";

  	public function createdByUser(){
    	return $this->belongsTo('App\User', 'createdByUserId', 'id');
    }
  	public function updatedByUser(){
    	return $this->belongsTo('App\User', 'updatedByUserId', 'id');
    }
}
