<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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
    return view('main');
});

Route::get('/bascet', function () {
    return view('bascet_phenix');
});

Route::get('/admin_panel', function () {
    return view('admin_panel');
});

Route::get('/users_admin', function () {
    return view('users_admin');
});

Route::get('/stream', function () {
    return view('stream');
});

Route::get('/video', function () {
    return view('video');
});

Route::get('/create_stream', function () {
    return view('create_stream');
});

Route::get('/card_stream', function () {
    return view('card_stream');
});

Route::get('/card_stream_main', function () {
    return view('card_stream_main');
});

Route::get('/analitik_card', function () {
    return view('analitik_card');
});

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('main');
