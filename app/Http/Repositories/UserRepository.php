<?php

namespace App\Http\Repositories;

use App\Enums\OrderStatus;
use App\Enums\PaymentStatus;
use App\Http\Resources\OrderResource;
use App\Models\Order;

class UserRepository
{
    public static function processingUserOrder($user)
    {
        $orders = Order::query()->whereHas('orderDetails', function ($q) {
            $q->where('status', OrderStatus::Received->value);
        })->where('user_id', $user->id)->where('status', PaymentStatus::Success->value)->get();

        return OrderResource::collection($orders);
    }

    public static function processingUserOrderCount($user)
    {
        return Order::query()->whereHas('orderDetails', function ($q) {
            $q->where('status', OrderStatus::Received->value);
        })->where('user_id', $user->id)->where('status', PaymentStatus::Success->value)->get()->count();
    }
}
