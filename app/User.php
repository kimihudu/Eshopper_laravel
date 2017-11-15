<?php

namespace App;

use Illuminate\Notifications\Notifiable;
// use Illuminate\Foundation\Auth\User as Authenticatable;
// use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
// use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
// use Illuminate\Auth\Passwords\CanResetPassword;
// use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
// use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Authenticatable//,AuthenticatableContract, CanResetPasswordContract
{
    use Notifiable;//, CanResetPassword,AuthenticableTrait;
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = ['email'=>'users.email'];
    
    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
    'password', 'remember_token',
    ];
    
    protected $collection = 'users';
    
}