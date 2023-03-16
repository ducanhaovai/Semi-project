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

Route::post('/register_url', [HomeController::class, 'store'])->name('auth.register');

route::get('/users/{id}', [HomeController::class, 'detialUser'])->name('user.detail');
route::get('/hotels/{id}', [HomeController::class, 'detialRoom'])->name('hotel.detail');

Route::get('/hotel', [HomeController::class, 'hotel'])->name('hotel');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/user', [HomeController::class, 'user'])->name('user');

Route::post('/acc-update-success', [HomeController::class, 'update'])->name('acc.edit');
Route::post('/change-password', [HomeController::class, 'updatePassword'])->name('update-password');
Route::get('/room', '\App\Http\Controllers\Admin\RoomController@index')->name('admin.room');


Route::group(
    ['prefix' => 'admin'],
    function () {
        // Route::get("/", "TwoFaceAuthsController@index")->name("2fa_setting");
        Route::get('/index', '\App\Http\Controllers\Admin\AdminController@index')->name('admin.index');
        Route::get('/index1', '\App\Http\Controllers\Admin\BookingsController1@index')->name('admin.listBookings');

        Route::post('/booking/store', '\App\Http\Controllers\Admin\BookingsController1@store')->name('bookings.store');

        
        Route::get('/hotel', '\App\Http\Controllers\Admin\RoomController@index')->name('room');
        Route::post('/hotel/store', '\App\Http\Controllers\Admin\RoomController@store')->name('room.store');
        Route::get('/hotel/create', '\App\Http\Controllers\Admin\RoomController@create')->name('room.create');
        Route::post('/hotel/create', '\App\Http\Controllers\Admin\RoomController@store')->name('room.store');
        Route::get('/hotel/{id}/edit',  '\App\Http\Controllers\Admin\RoomController@edit')->name('room.edit');
        Route::post('/hotel/{id}/edit',  '\App\Http\Controllers\Admin\RoomController@update')->name('room.update');
        Route::get('/hotel/{id}/delete',  '\App\Http\Controllers\Admin\RoomController@destroy')->name('room.delete');
        Route::get('/hotel/{id}',  '\App\Http\Controllers\Admin\RoomController@show')->name('room.detail');

        Route::get('/users', '\App\Http\Controllers\Admin\UsersController@index')->name('users');
        Route::post('/users/store', '\App\Http\Controllers\Admin\UsersController@store')->name('users.store');
        Route::get('/users/create', '\App\Http\Controllers\Admin\UsersController@create')->name('users.create');
        Route::post('/users/create', '\App\Http\Controllers\Admin\UsersController@store')->name('users.store');
        Route::get('/users/{id}/edit',  '\App\Http\Controllers\Admin\UsersController@edit')->name('users.edit');
        Route::post('/users/{id}/edit',  '\App\Http\Controllers\Admin\UsersController@update')->name('users.update');
        Route::get('/users/{id}/delete',  '\App\Http\Controllers\Admin\UsersController@destroy')->name('users.delete');
        Route::get('/users/{id}',  '\App\Http\Controllers\Admin\UsersController@show')->name('users.detail');
        // Route::get('/{path?}', function($path = null){
        //     return View::make('admin.index');
        // })->where('path', '.*');
    }
);
