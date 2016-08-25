<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
    * A user can have many articles.
    **/
    public function articles(){
        return $this->hasMany('App\Article');
    }//another example hasOne,

    public function isATeamManager(){
        return true;
    }
    /*//just example
    public function setPasswordAttribute($password){
        $this->attributes['password']=bcrypt($password);
    }// $user->password='foobar';
    */
}
