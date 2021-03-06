<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable=['user_id','session_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class,'cart_id');
    }

    public function setUser(User $user)
    {
        $this->user_id=$user->id;
        $this->update();
    }

}
