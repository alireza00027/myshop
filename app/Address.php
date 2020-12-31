<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{


    protected $fillable=['user_id','city_id','body'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
