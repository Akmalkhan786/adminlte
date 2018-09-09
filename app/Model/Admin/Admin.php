<?php

namespace App\Model\Admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'status', 'image'
    ];
    protected $hidden = [
        'password',
    ];

    public function roles(){
        return $this->belongsToMany('App\Model\Admin\Role');
    }

    public function getNameAttribute($value){
        return ucfirst($value);
    }
}
