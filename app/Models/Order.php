<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'payment_method',
        'total',
        'phone',
        'address',
        'city',
        'province',
        'postal_code',
        'status',
        'cancel_reason',
        'cancelled_at',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
