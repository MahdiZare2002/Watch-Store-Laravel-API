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

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
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
    Route::resource('colors', \App\Http\Controllers\Admin\ColorController::class);
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
    Route::resource('property_groups', \App\Http\Controllers\Admin\PropertyGroupController::class);
    Route::resource('properties', \App\Http\Controllers\Admin\PropertyController::class);
    Route::get('create_product_properties/{product}', [\App\Http\Controllers\Admin\ProductController::class, 'addProperties'])->name('create.product.properties');
    Route::post('store_product_properties/{product}', [\App\Http\Controllers\Admin\ProductController::class, 'storeProperties'])->name('store.product.properties');

    Route::get('create_product_gallery/{product}', [\App\Http\Controllers\Admin\GalleryController::class, 'addGallery'])->name('create.product.galley');
    Route::post('store_product_gallery/{product}', [\App\Http\Controllers\Admin\GalleryController::class, 'storeGallery'])->name('store.product.galley');
});

require __DIR__ . '/auth.php';
