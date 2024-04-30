<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyGroup;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $title = "لیست ویژگی ها";
        return  view('admin.property.list', compact('title'));
    }

    public function create()
    {
        $title = "ایجاد  ویژگی ";
        $property_groups = PropertyGroup::query()->pluck('title', 'id');
        return view('admin.property.create', compact('title','property_groups'));
    }

    public function store(Request $request)
    {
        Property::query()->create([
            'title'=>$request->input('title'),
            'property_group_id'=>$request->input('property_group_id')
        ]);

        return  redirect()->route('properties.index')->with('message',' ویژگی  با موفقیت ایجاد شد');
    }

    public function show()
    {
    }

    public function edit(Property $property)
    {
        $property_groups = PropertyGroup::query()->pluck('title', 'id');
        $title = "ویرایش ویژگی ";
        return view('admin.property.edit', compact('title','property','property_groups'));
    }

    public function update(Request $request, Property $property)
    {
        $property->update([
            'title'=>$request->input('title'),
            'property_group_id'=>$request->input('property_group_id')
        ]);
        return  redirect()->route('properties.index')->with('message',' ویژگی با موفقیت ویرایش شد');
    }

    public function destroy($id)
    {
        //
    }
}
