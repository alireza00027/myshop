<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','mobile','card_number'
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function cart()
    {
        return $this->belongsTo(Cart::class,'user_id');
    }

    public function addresses()
    {
        return $this->hasMany(Address::class,'user_id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class,'user_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role)
    {
        if (is_string($role)){
           return $this->roles->contains('name',$role);
        }

        return !! $role->intersect($this->roles)->count();
    }

}
