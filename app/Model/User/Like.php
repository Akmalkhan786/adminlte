<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function post(){
        return $this->belongsTo('App\Model\User\Post', 'like');
    }
}
