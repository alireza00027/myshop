<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable=['title','state_id'];


    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class,'city_id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class,'city_id');
    }

}
