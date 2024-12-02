<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable=[
        'user_id',
    ];
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
    
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
