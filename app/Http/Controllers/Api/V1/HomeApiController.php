<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ProductRepository;
use App\Http\Services\Keys;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeApiController extends Controller
{
    public function home()
    {
        return response()->json([
            'result' => true,
            'message' => 'Application Home Page',
            'data' => [
                Keys::sliders => Slider::getSliders(),
                Keys::categories => Category::getAllCategories(),
                Keys::amazing_products => ProductRepository::get6AmazingProducts(),
                Keys::banner => Slider::query()->inRandomOrder()->first(),
                Keys::most_seller_products => '',
                Keys::newest_products => ''
            ]
        ]);
    }
}
