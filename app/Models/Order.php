<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_price',
        'code',
        'status',
        'transaction_id',
        'address_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function recievedOrderDetails()
    {
        return $this->hasMany(OrderDetail::class)->where('status', OrderStatus::Received->value);
    }
}
