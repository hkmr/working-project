<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    public function category(){

    	return $this->belongsTo('App\Category');
    }

    public function user(){

    	return $this->belongsTo('App\User');
    }

    public function tags(){

    	return $this->belongsToMany('App\Tag');
    }

    public function comments() {
    	return $this->hasMany('App\Comment');
    }

    // function for like post
    public function likes()
    {
        return $this->morphToMany('App\User', 'likeable')->whereDeletedAt(null);
    }

    public function getIsLikedAttribute()
    {
        $like = $this->likes()->whereUserId(Auth::id())->first();
        return (!is_null($like)) ? true : false;
    }

}
