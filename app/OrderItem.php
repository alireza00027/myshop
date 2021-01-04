<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable=['order_id','product_id','product_count','price'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function getProduct()
    {
        return Product::whereId($this->product_id)->first();
    }
}
