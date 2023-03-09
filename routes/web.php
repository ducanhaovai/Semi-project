<?php

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

<<<<<<< Updated upstream
Route::get('/', function () {
    return view('welcome');
});
=======
Route::get('/','\App\Http\Controllers\HomeController@index')->name('index');
Route::get('/login', function () {
    return view('login');
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/detail',[HomeController::class,'detail_room'])->name('detail-room');
});

Route::get('/room',[HomeController::class,'room'])->name('room');
Route::get('/detail',[HomeController::class,'detail_room'])->name('detail-room');


Route::get('/login',[HomeController::class,'login'])->name('login');
Route::post('/login_url',[HomeController::class,'postLogin'])->name('auth.login');
Route::post('/register_url',[HomeController::class,'register'])->name('auth.register');






Route::group(['prefix' => 'admin'], function () {
        // Route::get("/", "TwoFaceAuthsController@index")->name("2fa_setting");
        Route::get('/index', '\App\Http\Controllers\Admin\AdminController@index')->name('admin.index');
        
        Route::get('/room', '\App\Http\Controllers\Admin\RoomController@index')->name('admin.room');
        Route::get('/room/form', '\App\Http\Controllers\Admin\RoomController@create')->name('admin.form');
        Route::get('/room/{id}',  '\App\Http\Controllers\Admin\RoomController@show')->name('admin.detail');
        // Route::get('/{path?}', function($path = null){
        //     return View::make('admin.index');
        // })->where('path', '.*');
    }
);
>>>>>>> Stashed changes
