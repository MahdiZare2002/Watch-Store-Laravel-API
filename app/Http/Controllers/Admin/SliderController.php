<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $title = "لیست اسلایدر ها";
        return view('admin.slider.list', compact('title'));
    }

    public function create()
    {
        $title = "ایجاد اسلایدر ";
        return view('admin.slider.create', compact('title'));
    }

    public function store(SliderRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'sliders');

            $result = $imageService->save($request->file('image'));
        } else {
            return redirect()->route('sliders.index')->with('message', 'عکس شما آپلود نشد');
        }
        $inputs['image'] = $result;
        Slider::query()->create($inputs);

        return redirect()->route('sliders.index')->with('message', 'اسلایدر با موفقیت ایجاد شد');
    }

    public function show($id)
    {
        //
    }

    public function edit(Slider $slider)
    {
        $title = "ویرایش اسلایدر ";
        return view('admin.slider.edit', compact('title', 'slider'));
    }

    public function update(SliderRequest $request, Slider $slider, ImageService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile('image')) {
            if (!empty($slider->image)) {
                $imageService->deleteDirectoryAndFiles($slider->image);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'sliders');
            $result = $imageService->save($request->file('image'));
            if ($result === false) {
                return redirect()->route('sliders.index')->with('message', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        } else {
            if (isset($inputs['image']) && !empty($slider->image)) {
                $image = $slider->image;
                $inputs['image'] = $image;
            }
        }
        $categories = Category::query()->pluck('title', 'id');
        $slider->update($inputs);

        return redirect()->route('sliders.index')->with('message', 'اسلایدر با موفقیت ویرایش شد');

    }

    public function destroy($id)
    {
        //
    }
}
