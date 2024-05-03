<?php

namespace App\Http\Repositories;

use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductRepository
{
    public static function get6AmazingProducts()
    {
        $products = Product::query()->where('is_special', true)
            ->orderBy('discount', 'DESC')->take(6)->get();

        return ProductResource::collection($products);
    }
}
