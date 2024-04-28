<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Http\Requests\SliderRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $title = "لیست برندها";
        return view('admin.brand.list', compact('title'));
    }

    public function create()
    {
        $title = "ایجاد برند ";
        return view('admin.brand.create', compact('title'));
    }

    public function store(BrandRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'brand');

            $result = $imageService->save($request->file('image'));
        } else {
            return redirect()->route('brands.index')->with('message', 'عکس شما آپلود نشد');
        }
        $inputs['image'] = $result;
        $brand = Brand::create($inputs);
        return redirect()->route('brands.index')->with('message', 'دسته بندی جدید شما با موفقیت ثبت شد');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $brand = Brand::query()->find($id);
        $title = "ویرایش برند ";
        return view('admin.brand.edit', compact('title', 'brand'));
    }


    public function update(BrandRequest $request, Brand $brand, ImageService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile('file')) {
            if (!empty($brand->image)) {
                $imageService->deleteDirectoryAndFiles($brand->image);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'brands');
            $result = $imageService->save($request->file('file'));
            if ($result === false) {
                return redirect()->route('brands.index')->with('message', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        } else {
            if (isset($inputs['image']) && !empty($brand->image)) {
                $image = $brand->image;
                $image['image'] = $inputs['image'];
                $inputs['image'] = $image;
            }
        }
        $categories = Category::query()->pluck('title', 'id');
        $brand->update($inputs);

        return redirect()->route('brands.index')->with('message', 'برند با موفقیت ویرایش شد');

    }


    public function destroy($id)
    {
        //
    }
}
