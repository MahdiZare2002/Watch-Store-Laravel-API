<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ProductRepository;
use App\Http\Services\Keys;
use App\Livewire\Admin\Products;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductsApiController extends Controller
{
    /**
     * @OA\Get(
     ** path="/api/v1/most_sold_products",
     *  tags={"Products Page"},
     *  description="get products page data",
     *   @OA\Response(
     *      response=200,
     *      description="Its Ok",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     **/
    public function mostSoldProducts()
    {
        return response()->json([
            'result' => true,
            'message' => 'Success',
            'data' => [
                Keys::brands => Brand::getAllBrands(),
                Keys::most_seller_products => ProductRepository::getMostSellingProducts()->response()->getData(true),
            ]
        ], status: 200);
    }

    /**
     * @OA\Get(
     ** path="/api/v1/most_viewed_products",
     *  tags={"Products Page"},
     *  description="get products page data",
     *   @OA\Response(
     *      response=200,
     *      description="Its Ok",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     **/
    public function mostViewedProducts()
    {
        return response()->json([
            'result' => true,
            'message' => 'Success',
            'data' => [
                Keys::brands => Brand::getAllBrands(),
                Keys::most_viewed_products => ProductRepository::getMostViewedProducts()->response()->getData(true),
            ]
        ], status: 200);
    }

    /**
     * @OA\Get(
     ** path="/api/v1/newest_products",
     *  tags={"Products Page"},
     *  description="get products page data",
     *   @OA\Response(
     *      response=200,
     *      description="Its Ok",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     **/
    public function newestProducts()
    {
        return response()->json([
            'result' => true,
            'message' => 'Success',
            'data' => [
                Keys::brands => Brand::getAllBrands(),
                Keys::newest_products => ProductRepository::getNewestProducts()->response()->getData(true),
            ]
        ], status: 200);
    }

    /**
     * @OA\Get(
     ** path="/api/v1/cheapest_products",
     *  tags={"Products Page"},
     *  description="get products page data",
     *   @OA\Response(
     *      response=200,
     *      description="Its Ok",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     **/
    public function cheapestProducts()
    {
        return response()->json([
            'result' => true,
            'message' => 'Success',
            'data' => [
                Keys::brands => Brand::getAllBrands(),
                Keys::cheapest_products => ProductRepository::getCheapestProducts()->response()->getData(true),
            ]
        ], status: 200);
    }

    /**
     * @OA\Get(
     ** path="/api/v1/most_expensive_products",
     *  tags={"Products Page"},
     *  description="get products page data",
     *   @OA\Response(
     *      response=200,
     *      description="Its Ok",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     **/
    public function mostExpensiveProducts()
    {
        return response()->json([
            'result' => true,
            'message' => 'Success',
            'data' => [
                Keys::brands => Brand::getAllBrands(),
                Keys::most_expensive_products => ProductRepository::getMostExpensiveProducts()->response()->getData(true),
            ]
        ], status: 200);
    }

    /**
     * @OA\Get(
     ** path="/api/v1/products_by_category/{id}",
     *  tags={"Products Page"},
     *  description="get products data by category id",
     * *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *         ),
     *     ),
     *   @OA\Response(
     *      response=200,
     *      description="Its Ok",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     **/
    public function productsByCategory($id): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'result' => true,
            'message' => 'Success To Get Products By Category',
            'data' => [
                Keys::brands => Brand::getAllBrands(),
                Keys::products_by_category => ProductRepository::getProductsByCategory($id)->response()->getData(true),
            ]
        ], status: 200);
    }

    /**
     * @OA\Get(
     ** path="/api/v1/products_by_brand/{id}",
     *  tags={"Products Page"},
     *  description="get products data by category id",
     * *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *         ),
     *     ),
     *   @OA\Response(
     *      response=200,
     *      description="Its Ok",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     **/
    public function productsByBrand($id): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'result' => true,
            'message' => 'Success To Get Products By Category',
            'data' => [
                Keys::brands => Brand::getAllBrands(),
                Keys::products_by_brand => ProductRepository::getProductsByBrand($id)->response()->getData(true),
            ]
        ], status: 200);
    }

}
