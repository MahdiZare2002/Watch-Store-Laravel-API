<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Image\ImageService;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function addGallery(Product $product)
    {
        $id = $product->id;
        return view('admin.product.create_gallery', compact('product', 'id'));
    }

    public function storeGallery(Request $request, Product $product, ImageService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'gallery');

            $result = $imageService->save($request->file('image'));
        } else {
            return redirect()->back()->with('message', 'عکس شما آپلود نشد');
        }
        $inputs['image'] = $result;
        $inputs['product_id'] = $product->id;
        Gallery::query()->create($inputs);
        return redirect()->back()->with('message', 'عکس با موفقیت ذخیره شد');
    }
}
