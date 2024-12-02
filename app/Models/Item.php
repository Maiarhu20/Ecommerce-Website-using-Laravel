<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable=[
        'cart_id',
        'order_id',
        'product_id',
        'quantity',
        'size'
    ];
    public function product()
    {
        return $this->hasOne(Product::class);
    }
    public function order()
    {
        return $this->hasOne(Order::class);
    }
    public function cart()
    {
        return $this->hasOne(Cart::class);
    }
}
