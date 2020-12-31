<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{


    protected $fillable=['title'];
    public function Cities()
    {
        return $this->hasMany(City::class,'state_id');
    }
}
