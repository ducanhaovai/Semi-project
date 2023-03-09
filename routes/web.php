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


Route::get('/', function () {
    return view('welcome');
});
=======
Route::get('/','\App\Http\Controllers\HomeController@index')->name('index');
Route::get('/login', function () {
    return view('login');
});
=======
Route::get('/','\App\Http\Controllers\HomeController@index');
Route::get('/login', function () {
    return view('login');
});
>>>>>>> HongPhuc

Route::group(['prefix' => 'user'], function () {
    Route::get('/detail',[HomeController::class,'detail_room'])->name('detail-room');
});

<<<<<<< HEAD
Route::get('/room',[HomeController::class,'room'])->name('room');
Route::get('/detail',[HomeController::class,'detail_room'])->name('detail-room');


Route::get('/login',[HomeController::class,'login'])->name('login');
Route::post('/login_url',[HomeController::class,'postLogin'])->name('auth.login');
Route::post('/register_url',[HomeController::class,'register'])->name('auth.register');


=======
Route::get('/detail',[HomeController::class,'detail_room'])->name('detail-room');


>>>>>>> HongPhuc




Route::group(['prefix' => 'admin'], function () {
        // Route::get("/", "TwoFaceAuthsController@index")->name("2fa_setting");
<<<<<<< HEAD
        Route::get('/index', '\App\Http\Controllers\Admin\AdminController@index')->name('admin.index');
=======
        Route::get('/index', '\App\Http\Controllers\Admin\AdminController@index');
>>>>>>> HongPhuc
        
        Route::get('/room', '\App\Http\Controllers\Admin\RoomController@index')->name('admin.room');
        Route::get('/room/form', '\App\Http\Controllers\Admin\RoomController@create')->name('admin.form');
        Route::get('/room/{id}',  '\App\Http\Controllers\Admin\RoomController@show')->name('admin.detail');
        // Route::get('/{path?}', function($path = null){
        //     return View::make('admin.index');
        // })->where('path', '.*');
    }
);
<<<<<<< HEAD
>>>>>>> Stashed changes
=======
>>>>>>> HongPhuc
