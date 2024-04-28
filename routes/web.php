<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

Route::prefix('admin')->middleware('auth')->group(function () {
    // -------------------- Main Routes -------------------- //
    Route::get('/', [\App\Http\Controllers\Admin\PanelController::class, 'index'])->name('panel');

    // -------------------- User Routes -------------------- //
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class);
    Route::get('create_user_roles/{user}', [\App\Http\Controllers\Admin\UserController::class, 'createUserRoles'])->name('create.user.roles');
    Route::post('store_user_roles/{user}', [\App\Http\Controllers\Admin\UserController::class, 'storeUserRoles'])->name('store.user.roles');
    Route::get('logs', [\App\Http\Controllers\Admin\LogViewerController::class, 'index'])->name('logs');

    // -------------------- Products Routes -------------------- //
    Route::resource('category', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('sliders', \App\Http\Controllers\Admin\SliderController::class);
    Route::resource('brands', \App\Http\Controllers\Admin\BrandController::class);
});

require __DIR__ . '/auth.php';
