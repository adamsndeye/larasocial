<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	 protected $guarded= [];
    protected $fillable = [
        'titre','description', 'image','user_id'
    ];
public function user(){

    	return $this->belongsTo('App\User');
    }
   

  public function comments(){

    	return $this->morphMany('App\Comment','commentable')->latest();
    }



}
