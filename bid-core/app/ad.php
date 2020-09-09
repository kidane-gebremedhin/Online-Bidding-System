<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ad extends Model
{
   protected $table="ads";

  	public function class(){
    	return $this->belongsTo('App\class_', 'classId', 'id');
    }
  	public function createdByUser(){
    	return $this->belongsTo('App\User', 'createdByUserId', 'id');
    }
  	public function updatedByUser(){
    	return $this->belongsTo('App\User', 'updatedByUserId', 'id');
    }
  	public function deletedByUser(){
    	return $this->belongsTo('App\User', 'deletedByUserId', 'id');
    }

}
