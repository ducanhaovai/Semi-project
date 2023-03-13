<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', '\App\Http\Controllers\HomeController@index')->name('index');


Route::group(['prefix' => 'user'], function () {
    Route::get('/detail', [HomeController::class, 'detail_room'])->name('detail-room');
});

Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::post('/login_url', [HomeController::class, 'postLogin'])->name('postLogin');

Route::post('/logout', [HomeController::class, 'logout'])->name('logout');

Route::get('/login-user', [HomeController::class, 'loginuser'])->name('login-user');
Route::post('/register_url', [HomeController::class, 'store'])->name('auth.register');


route::get('/hotels/{id}', [HomeController::class, 'detialRoom'])->name('hotel.detail');
Route::get('/detail', [HomeController::class, 'detail_room'])->name('detail-room');
Route::get('/hotel', [HomeController::class, 'hotel'])->name('hotel');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/user', [HomeController::class, 'user'])->name('user');



Route::get('/room', '\App\Http\Controllers\Admin\RoomController@index')->name('admin.room');


Route::group(
    ['prefix' => 'admin'],
    function () {
        // Route::get("/", "TwoFaceAuthsController@index")->name("2fa_setting");
        Route::get('/index', '\App\Http\Controllers\Admin\AdminController@index')->name('admin.index');
        Route::get('/index1', '\App\Http\Controllers\Admin\BookingsController1@index')->name('admin.index1');
        Route::post('/hotel/store', '\App\Http\Controllers\Admin\RoomController@store')->name('admin.store');

        Route::post('/booking/store', '\App\Http\Controllers\Admin\BookingsController1@store')->name('bookings.store');
        
        Route::get('/room', '\App\Http\Controllers\Admin\RoomController@index')->name('admin.room');
        Route::get('/room/form', '\App\Http\Controllers\Admin\RoomController@create')->name('admin.form');
        Route::get('/room/{id}',  '\App\Http\Controllers\Admin\RoomController@show')->name('admin.detail');
        // Route::get('/{path?}', function($path = null){
        //     return View::make('admin.index');
        // })->where('path', '.*');
    }
);
