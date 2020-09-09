<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tender extends Model
{
   protected $table="tender";

    public function likedUsers(){
        return $this->belongsToMany('App\user', 'tender_likes', 'tenderId', 'userId')->orderBy('id', 'desc');
    }
    public function pinedUsers(){
        return $this->belongsToMany('App\user', 'tender_pins', 'tenderId', 'userId')->orderBy('id', 'desc');
    }
    public function likes(){
        return $this->hasMany('App\tender_like', 'tenderId', 'id')->orderBy('id', 'desc');
    }
    public function pins(){
        return $this->hasMany('App\tender_pin', 'tenderId', 'id')->orderBy('id', 'desc');
    }

    public function isLiked($userId){
        return tender_like::where('tenderId', $this->id)->where('userId', $userId)->first()!=null;
    }
    public function isPined($userId){
        return tender_pin::where('tenderId', $this->id)->where('userId', $userId)->first()!=null;
    }

    public function company(){
        return $this->belongsTo('App\company', 'companyId', 'id');
    }
    public function businessCategory(){
        return $this->belongsTo('App\business_category', 'businessCategoryId', 'id');
    }

    public function country(){
        return $this->belongsTo('App\country', 'countryId', 'id');
    }
    public function region(){
        return $this->belongsTo('App\region', 'regionId', 'id');
    }
    public function zone(){
        return $this->belongsTo('App\zone', 'zoneId', 'id');
    }
    public function wereda(){
        return $this->belongsTo('App\wereda', 'weredaId', 'id');
    }

  	public function createdByUser(){
    	return $this->belongsTo('App\User', 'createdByUserId', 'id');
    }
  	public function updatedByUser(){
    	return $this->belongsTo('App\User', 'updatedByUserId', 'id');
    }
}
