<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
   protected $table="company";

    public function tenders(){
      return $this->hasMany('App\tender', 'companyId', 'id')->orderBy('id', 'desc');
    }

  	public function createdByUser(){
    	return $this->belongsTo('App\User', 'createdByUserId', 'id');
    }
  	public function updatedByUser(){
    	return $this->belongsTo('App\User', 'updatedByUserId', 'id');
    }
}
