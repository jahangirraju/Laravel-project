<?php

use App\Http\Controllers\AdminPagesController;
use App\Http\Controllers\AttributesController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RichController;
use App\Http\Controllers\ShelfsController;
use App\Http\Controllers\UnitsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/contact', [PagesController::class, 'contact'])->name('contact');

Route::get('/', [PagesController::class, 'index'])->name('index');


/**
 * Product route
 */
Route::get('/products', [PagesController::class, 'products'])->name('products');
Route::get('/products/{slug}', [PagesController::class, 'search'])->name('show');
Route::get('/search', [PagesController::class, 'search'])->name('search');


 Route::get('/admin', [AdminPagesController::class, 'index'])->name('admin.index');
Route::get('/admin/products', [AdminPagesController::class, 'product'])->name('admin.products.index');
Route::get('/admin/products/create', [AdminPagesController::class, 'create'])->name('admin.products.create');

Route::get('/admin/products/edit/{id}', [AdminPagesController::class, 'edit'])->name('admin.products.edit');
Route::post('/admin/products/edit/{id}', [AdminPagesController::class, 'update'])->name('admin.products.update');

Route::post('/admin/products/create', [AdminPagesController::class, 'store'])->name('admin.products.store');

Route::post('/admin/products/delete/{id}', [AdminPagesController::class, 'delete'])->name('admin.products.delete');

// manage Category
Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');

Route::get('/admin/categories/edit/{id}', [CategoryController::class, 'edit'])->name('admin.categories.edit');
Route::put('/admin/categories/edit/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');

Route::post('/admin/categories/create', [CategoryController::class, 'store'])->name('admin.categories.store');

Route::post('/admin/categories/delete/{id}', [CategoryController::class, 'delete'])->name('admin.categories.delete');

// shelfs route
// Route::get('admin/shelfs', [ShelfsController::class, 'index'])->name('admin.shelfs.index');
// Route::get('admin/shelfs/create', [ShelfsController::class, 'create'])->name('admin.shelfs.create');
// Route::post('admin/shelfs/store', [ShelfsController::class, 'store'])->name('admin.shelfs.store');
// Route::post('/admin/shelfs/edit/{id}', [ShelfsController::class, 'update'])->name('admin.shelfs.update');
// Route::get('/admin/shelfs/edit/{id}', [ShelfsController::class, 'edit'])->name('admin.shelfs.edit');
// Route::delete('/admin/shelfs/delete/{id}', [ShelfsController::class, 'destroy'])->name('admin.shelfs.destroy');

// // attributes route

// Route::get('admin/attributes', [AttributesController::class, 'index'])->name('admin.attributes.index');
// Route::get('admin/attributes/create', [AttributesController::class, 'create'])->name('admin.attributes.create');
// Route::post('/admin/attributes/store', [AttributesController::class, 'store'])->name('admin.attributes.store');
// Route::get('/admin/attributes/edit/{id}', [AttributesController::class, 'edit'])->name('admin.attributes.edit');
// Route::post('/admin/attributes/update/{id}', [AttributesController::class, 'update'])->name('admin.attributes.update');
// Route::delete('/admin/attributes/delete/{id}', [AttributesController::class, 'destroy'])->name('admin.attributes.destroy');

// // // Units codes
// Route::get('admin/units', [UnitsController::class, 'index'])->name('admin.units.index');
// Route::get('admin/units/create', [UnitsController::class, 'create'])->name('admin.units.create');
// Route::post('/admin/units/store', [UnitsController::class, 'store'])->name('admin.units.store');
// Route::get('/admin/units/edit/{id}', [UnitsController::class, 'edit'])->name('admin.units.edit');
// Route::post('/admin/units/update/{id}', [UnitsController::class, 'update'])->name('admin.units.update');
// Route::delete('/admin/units/delete/{id}', [UnitsController::class, 'destroy'])->name('admin.units.destroy');

// // // usser route
// Route::get('admin/users.', [UsersController::class, 'index'])->name('admin.users.index');
// Route::get('admin/users/create', [UsersController::class, 'create'])->name('admin.users.create');
// Route::post('/admin/users/store', [UsersController::class, 'store'])->name('admin.users.store');
// Route::get('/admin/users/edit/{id}', [UsersController::class, 'edit'])->name('admin.users.edit');
// Route::post('/admin/users//update/{id}', [UsersController::class, 'update'])->name('admin.users.update');
// Route::delete('/admin/users/delete/{id}', [UsersController::class, 'destroy'])->name('admin.users.destroy');
 Route::group(['prefix' => 'admin', 'as' => 'admin.'], function($r) {
     //Route::resource('products', AdminPagesController::class);
     Route::resource('users', UsersController::class);
     Route::resource('units', UnitsController::class);
     Route::resource('attributes', AttributesController::class);
     Route::resource('shelfs', ShelfsController::class);
 });

 

//  rich route

 Route::get('admin/riches', [RichController::class, 'index'])->name('admin.rich.index');
