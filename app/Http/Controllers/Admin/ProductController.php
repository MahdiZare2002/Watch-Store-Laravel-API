<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Services\Image\ImageService;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\PropertyGroup;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $title = "لیست محصولات";
        return view('admin.product.list', compact('title'));
    }

    public function create()
    {
        $title = "اضافه کردن محصول";
        $categories = Category::query()->pluck('title', 'id');
        $brands = Brand::query()->pluck('title', 'id');
        $colors = Color::query()->pluck('title', 'id');
        return view('admin.product.create', compact('title', 'categories', 'brands', 'colors'));
    }

    public function store(Request $request, ImageService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product');

            $result = $imageService->save($request->file('image'));
        } else {
            return redirect()->route('products.index')->with('message', 'عکس شما آپلود نشد');
        }
        $inputs['image'] = $result;
        $inputs['slug'] = Helper::make_slug($request->input('title'));
        $inputs['is_special'] = $request->input('is_special') === 'on';
        $inputs['special_expiration'] = ($request->input('special_expiration') !== null ? Verta::parse($request->input('special_expiration'))->datetime() : now());
        $product = Product::query()->create($inputs);

        $colors = $request->input('colors');
        $product->colors()->attach($colors);

        return redirect()->route('products.index')->with('message', 'محصول با موفقیت اضافه شد');
    }

    public function show($id)
    {
        //
    }

    public function edit(Product $product)
    {
        $title = "لیست محصولات";
        $categories = Category::query()->pluck('title', 'id');
        $brands = Brand::query()->pluck('title', 'id');
        $colors = Color::query()->pluck('title', 'id');
        return view('admin.product.edit', compact('title', 'product', 'categories', 'brands', 'colors'));
    }

    public function update(Request $request, Product $product, ImageService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile('image')) {
            if (!empty($product->image)) {
                $imageService->deleteDirectoryAndFiles($product->image);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product');
            $result = $imageService->save($request->file('image'));
            if ($result === false) {
                return redirect()->route('products.index')->with('message', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        } else {
            if (isset($inputs['image']) && !empty($brand->image)) {
                $image = $brand->image;
                $inputs['image'] = $image;
            }
        }

        $inputs['slug'] = Helper::make_slug($request->input('title'));
        $inputs['is_special'] = $request->input('is_special') === 'on';
        $inputs['special_expiration'] = ($request->input('special_expiration') !== null ? Verta::parse($request->input('special_expiration'))->datetime() : now());

        $colors = $request->input('colors');
        $product->colors()->sync($colors);

        $product->update($inputs);
        return redirect()->route('products.index')->with('message', 'محصول با موفقیت ویرایش شد');
    }

    public function destroy($id)
    {
        //
    }

    public function addProperties(Product $product)
    {
        $property_groups = PropertyGroup::query()->get();
        return view('admin.product.create_property', compact('property_groups', 'product'));
    }

    public function storeProperties(Request $request, Product $product)
    {
        $product->properties()->sync($request->properties);
        return redirect()->route('products.index')->with('message', 'ویژگی ها با موفقیت اضافه شد');

    }
}
