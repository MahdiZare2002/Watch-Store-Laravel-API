<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Services\Image\ImageService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Intervention\Image\ImageManager;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.user.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile('file')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'post');
            $result = $imageService->save($request->file('file'));
            if ($result === false) {
                return redirect()->route('admin.content.post.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['photo'] = $result;
        }
        $inputs['password'] = Hash::make($inputs['password']);
        $user = User::create($inputs);
        return redirect()->route('users.index')->with('message', 'کاربر جدید با موفقیت ثبت شد');
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
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user, ImageService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile('file')) {
            if (!empty($user->photo)) {
                $imageService->deleteDirectoryAndFiles($user->photo);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'post');
            $result = $imageService->save($request->file('file'));
            if ($result === false) {
                return redirect()->route('admin.content.post.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['photo'] = $result;
        } else {
            if (isset($inputs['photo']) && !empty($user->photo)) {
                $photo = $user->photo;
                $photo['photo'] = $inputs['photo'];
                $inputs['photo'] = $photo;
            }
        }
        $inputs['password'] = (isset($request->password)) ? Hash::make($inputs['password']) : $user->password;
        $user->update($inputs);
        return redirect()->route('users.index')->with('message', 'آپدیت شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}