<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HashController;

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

//Route::get('/bascet', function () {
    //return view('bascet_phenix');
//});

Route::get('/admin_panel', function () {
    return view('admin_panel');
});

Route::get('/users_admin', function () {
    return view('users_admin');
});

Route::get('/stream', function () {
    return view('stream');
});

Route::get('/abonent_stream', function () {
    return view('abonent_stream');
});

Route::get('/video', function () {
    return view('video');
});

Route::get('/create_stream', function () {
    return view('create_stream');
});

Route::get('/abonent_create_stream', function () {
    return view('abonent_create_stream');
});

Route::get('/card_stream', function () {
    return view('card_stream');
});

Route::get('/abonent_card_stream', function () {
    return view('abonent_card_stream');
});

Route::get('/card_stream_main', function () {
    return view('card_stream_main');
});

Route::get('/analitik_card', function () {
    return view('analitik_card');
});

Route::get('/abonent_analitik_card', function () {
    return view('analitik_card');
});

Route::get('/card_monitor', function () {
    return view('card_monitor');
});

Route::get('/abonent_card_monitor', function () {
    return view('abonent_card_monitor');
});

Route::get('/card_broadcast', function () {
    return view('card_broadcast');
});

Route::get('/abonent_card_broadcast', function () {
    return view('abonent_card_broadcast');
});

Route::get('/card_restream', function () {
    return view('card_restream');
});

Route::get('/abonent_card_restream', function () {
    return view('abonent_card_restream');
});

Route::get('/user_panel', function () {
    return view('user_panel');
});

Route::get('/card_product', function () {
    return view('card_product');
});

Route::get('/terms_of_user', function () {
    return view('terms_of_user');
});

Route::get('/refund_policy', function () {
    return view('refund_policy');
});

Route::get('/privacy_policy', function () {
    return view('privacy_policy');
});

Route::get('/tags', function () {
    return view('tags');
});

Route::get('/search', function () {
    return view('search');
});

Route::get('/purchases', function () {
    return view('purchases');
});

Route::get('/balance', function () {
    return view('balance');
});

Route::get('/access_in_countries', function () { 
    return view('access_in_countries');
});

Route::get('/entrypoint', function () {
    return view('entrypoint');
});

Route::get('/player_stream', function () {
    return view('player_stream');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/product_admin', [ProductController::class, 'index'])->name('products');//function () {
    //return view('product_admin');
//});

Route::get('/product_add', [ProductController::class, 'create'])->name('product_add');//function () {// ProductPhoenix::class .'@index')->name('products');//'ProductPhoenix@index');//->name('Product');//// 
    //return view('product_add');
    //$products = Product::all;//latest()->paginate(5);
    //return view('product_admin')->with(compact('products'));
//});

Route::get('/promocode', function () {
    return view('promocode');
});

Route::get('/video_add', function () {
    return view('video_add');
});

Route::get('/sell_panel', function () {
    return view('sell_panel');
});

//Route::resource('products', ProductPhoenix::class);
//Route::group(['middleware' => ['web']], function() {
    //Route::resource('products', ProductPhoenix::class);
    
//});
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('main');//


Route::middleware('auth')->group(function () {
    //Route::get('/hash', [HashController::class, 'index']);
    Route::post('/hash', [App\Http\Controllers\HashController::class, 'index'])->name('hash');
});