<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ProductRepository;
use App\Http\Resources\CommentResource;
use App\Http\Resources\ProductResource;
use App\Http\Services\Keys;
use App\Livewire\Admin\Products;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use function Sodium\increment;

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

    /**
     * @OA\Get(
     ** path="/api/v1/product_details/{id}",
     *  tags={"Product Details"},
     *  description="get product details data by product id",
     *     @OA\Parameter(
     *         description="product id",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
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
    public function productDetail(Product $product): \Illuminate\Http\JsonResponse
    {
        $product->increment('review');
        return response()->json([
            'result' => true,
            'message' => 'Success To Get Product Details',
            'data' => [
                new ProductResource($product),
            ]
        ], status: 200);
    }

    /**
     * @OA\Post(
     ** path="/api/v1/save_product_comment",
     *  tags={"Product Details"},
     *   security={{"sanctum":{}}},
     *  description="save user comment for product",
     * @OA\RequestBody(
     *    required=true,
     *         @OA\MediaType(
     *           mediaType="multipart/form-data",
     *           @OA\Schema(
     *           @OA\Property(
     *                  property="product_id",
     *                  description="product id",
     *                  type="integer",
     *               ),
     *     *           @OA\Property(
     *                  property="parent_id",
     *                  description="parent id",
     *                  type="integer",
     *               ),
     *          @OA\Property(
     *                  property="body",
     *                  description="user comment text",
     *                  type="string",
     *               ),
     *           ),
     *       )
     * ),
     *   @OA\Response(
     *      response=200,
     *      description="Data saved",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     **/
    public function saveComment(Request $request)
    {
        $user = auth()->user();
        Comment::query()->create([
            'product_id' => $request->input('product_id'),
            'parent_id' => $request->input('parent_id', null),
            'body' => $request->input('body'),
            'user_id' => $user->id,
        ]);

        $product = Product::query()->find($request->input('product_id'));

        return response()->json([
            'result' => true,
            'message' => 'Success To Save Comment',
            'data' => [
                new ProductResource($product),
            ]
        ], status: 200);
    }

}
