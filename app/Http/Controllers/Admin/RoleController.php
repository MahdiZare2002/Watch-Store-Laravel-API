<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'لیست نقش ها';
        return view('admin.role.list', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'ایجاد نقش';
        return view('admin.role.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $user = Role::create($input);
        return redirect()->route('roles.index')->with('message', 'نقش با موفقیت ایجاد شد');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param Role $role
     */
    public function edit(Role $role)
    {
        $title = 'ویرایش نقش';
        return view('admin.role.edit', compact('title', 'role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $input = $request->all();
        $role->update($input);
        return redirect()->route('roles.index')->with('message', 'نقش با موفقیت آپدیت شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
