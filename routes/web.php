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

use App\Http\Controllers\Admin\EventController;
Route::controller(EventController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('event/create', 'add')->name('event.add');
    Route::post('event/create', 'create')->name('event.create');
    Route::get('event', 'index')->name('event.index');
    Route::get('event/edit', 'edit')->name('event.edit');
    Route::post('event/edit', 'update')->name('event.update');
    Route::get('event/delete', 'delete')->name('event.delete');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

