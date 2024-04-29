<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $title = "لیست رنگ ها";
        return view('admin.color.list', compact('title'));
    }

    public function create()
    {
        $title = "ایجاد رنگ ";
        return view('admin.color.create', compact('title'));
    }

    public function store(Request $request)
    {
        Color::query()->create([
            'title' => $request->input('title'),
            'code' => $request->input('code')
        ]);

        return redirect()->route('colors.index')->with('message', 'رنگ با موفقیت ذخیره شد');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $title = "ویرایش رنگ ";
        $color = Color::query()->find($id);
        return view('admin.color.edit', compact('title', 'color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        Color::query()->find($id)->update([
            'title' => $request->input('title'),
            'code' => $request->input('code')
        ]);

        return redirect()->route('colors.index')->with('message', 'رنگ با موفقیت ویرایش شد');
    }

    public function destroy($id)
    {
        //
    }
}
