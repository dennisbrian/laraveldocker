<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function seller()
    {
        return $this->belongsTo(User::class,
            'user_id');
    }

    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

}
