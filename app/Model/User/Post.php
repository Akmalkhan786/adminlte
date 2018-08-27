<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function tags(){
        return $this->belongsToMany('App\Model\User\Tag', 'post');
    }
}
