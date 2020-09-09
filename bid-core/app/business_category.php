<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class business_category extends Model
{
   protected $table="business_categories";

  	public function createdByUser(){
    	return $this->belongsTo('App\User', 'createdByUserId', 'id');
    }
  	public function updatedByUser(){
    	return $this->belongsTo('App\User', 'updatedByUserId', 'id');
    }
}
