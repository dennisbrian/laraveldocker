<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Order extends Model
{
    use HasFactory;

    protected $casts = [
        'order_date' => 'datetime'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class,'user_id');
    }

    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function setOrderDateAttribute($value)
    {
        $this->attributes['order_date'] =
        Carbon::parse($value);
    }
}
