<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable=['product_id','cart_id','product_count','discount'];


    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }


    public function getProduct()
    {
        return Product::whereId($this->product_id)->first();
    }

    public function pushCount($count)
    {
       $productCount=$this->product_count;
       $this->product_count=$productCount+$count;
       $this->update();

    }
}
