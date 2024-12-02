<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MultiImage extends Model
{
    protected $fillable=[
        'image_path',
        'product_id'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
