<?php

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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\Admin\ShopController;
Route::controller(ShopController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('shop/create', 'add')->name('shop.add');
    Route::post('shop/create', 'create')->name('shop.create');
    Route::get('shop', 'index')->name('shop.index');
    Route::get('shop/edit', 'edit')->name('shop.edit');
    Route::post('shop/edit', 'update')->name('shop.update');
    Route::get('shop/delete', 'delete')->name('shop.delete');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

