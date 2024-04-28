<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Image\ImageService;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $title = 'لیست دسته بندی';
        return view('admin.category.list');
    }

    public function create()
    {
        $title = 'ایجاد دسته بندی';
        $categories = Category::query()->pluck('title', 'id');
        return view('admin.category.create', compact('title', 'categories'));
    }

    public function store(Request $request, ImageService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile('file')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'category');
            $result = $imageService->save($request->file('file'));
            if ($result === false) {
                return redirect()->route('category.index')->with('message', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }
        Category::query()->create($inputs);

        return redirect()->route('category.index')->with('message', 'دسته بندی با موفقیت ایجاد شد');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $category = Category::query()->find($id);
        $categories = Category::query()->pluck('title', 'id');
        return view('admin.category.edit', compact('category', 'categories'));
    }

    public function update(Request $request, Category $category, ImageService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile('file')) {
            if (!empty($user->image)) {
                $imageService->deleteDirectoryAndFiles($user->image);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'category');
            $result = $imageService->save($request->file('file'));
            if ($result === false) {
                return redirect()->route('category.index')->with('message', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        } else {
            if (isset($inputs['image']) && !empty($user->image)) {
                $image = $user->image;
                $image['image'] = $inputs['image'];
                $inputs['image'] = $image;
            }
        }
        $categories = Category::query()->pluck('title', 'id');
        $category->update($inputs);

        return redirect()->route('category.index')->with('message', 'دسته بندی با موفقیت ویرایش شد');
    }

    public function destroy($id)
    {
        //
    }
}
