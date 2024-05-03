<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ProductRepository;
use App\Http\Services\Keys;
use App\Livewire\Admin\Products;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductsApiController extends Controller
{
    public function mostSoldProducts()
    {
        return response()->json([
            'result' => true,
            'message' => 'Success',
            'data' => [
                Keys::categories => Category::getAllCategories(),
                Keys::most_seller_products => ProductRepository::getMostSellingProducts()->response()->getData(true),
            ]
        ], status: 200);
    }

    public function mostViewedProducts()
    {
        return response()->json([
            'result' => true,
            'message' => 'Success',
            'data' => [
                Keys::categories => Category::getAllCategories(),
                Keys::most_viewed_products => ProductRepository::getMostViewedProducts()->response()->getData(true),
            ]
        ], status: 200);
    }

    public function newestProducts()
    {
        return response()->json([
            'result' => true,
            'message' => 'Success',
            'data' => [
                Keys::categories => Category::getAllCategories(),
                Keys::newest_products => ProductRepository::getNewestProducts()->response()->getData(true),
            ]
        ], status: 200);
    }

    public function cheapestProducts()
    {
        return response()->json([
            'result' => true,
            'message' => 'Success',
            'data' => [
                Keys::categories => Category::getAllCategories(),
                Keys::cheapest_products => ProductRepository::getCheapestProducts()->response()->getData(true),
            ]
        ], status: 200);
    }

    public function mostExpensiveProducts()
    {
        return response()->json([
            'result' => true,
            'message' => 'Success',
            'data' => [
                Keys::categories => Category::getAllCategories(),
                Keys::most_expensive_products => ProductRepository::getMostExpensiveProducts()->response()->getData(true),
            ]
        ], status: 200);
    }

}
