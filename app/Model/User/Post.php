<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
      'title', 'sub_title', 'slug', 'body', 'status', 'posted_by', 'image', 'like', 'dis_like'
    ];
    public function tags(){
        return $this->belongsToMany('App\Model\User\Tag');
    }
    public function categories(){
        return $this->belongsToMany('App\Model\User\Category');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
