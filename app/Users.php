<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Users extends Eloquent implements AuthenticatableContract,CanResetPasswordContract
{
    //AuthenticableTrait
    use AuthenticableTrait,CanResetPassword;
    protected $collection = 'users';
    // protected $fillable = [
    //     'name', 'usrName', 'psw',
    // ];
}   
