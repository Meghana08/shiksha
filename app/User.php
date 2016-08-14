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
       'member_id', 'name', 'email', 'password', 'type_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function memberType() {
        return $this->hasOne('App\UserType', 'id', 'type_id');            
    }

    public function getMember() {
        if($this->memberType->type == 'student')
            return $this->hasOne('App\UserDetails', 'id', 'member_id');
        else
            return $this->hasOne('App\TutorRegDetail', 'id', 'member_id');            
    }

    public function isAdmin()
    {
        if($this->memberType->type == 'admin')
            return 1;
        else
            return 0;
    }
}
