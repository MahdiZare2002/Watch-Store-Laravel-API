<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyGroup;
use Illuminate\Http\Request;

class PropertyGroupController extends Controller
{
    public function index()
    {
        $title = "لیست گروه ویژگی ها";
        return view('admin.property_group.list', compact('title'));
    }


    public function create()
    {
        $title = "ایجاد گروه ویژگی ها";
        return view('admin.property_group.create', compact('title'));
    }


    public function store(Request $request)
    {
        PropertyGroup::query()->create([
            'title' => $request->input('title')
        ]);

        return redirect()->route('property_groups.index')->with('message', 'گروه ویژگی ها با موفقیت ایجاد شد');
    }


    public function show($id)
    {

    }


    public function edit(PropertyGroup $property_group)
    {
        $title = "ویرایش گروه ویژگی ها";
        return view('admin.property_group.edit', compact('title', 'property_group'));
    }


    public function update(Request $request, PropertyGroup $property_group)
    {
        $property_group->update([
            'title' => $request->input('title')
        ]);
        return redirect()->route('property_groups.index')->with('message', 'گروه ویژگی ها با موفقیت ایجاد شد');
    }


    public function destroy($id)
    {
        //
    }
}
