<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardProdukController;


use App\Models\Category;
use App\Models\Produk;

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

// Route::get('/', function () {
//     return view('in');
// });

// Route::get('/index', function(){
//     return view('index');
// });

Route::get('/', [UserController::class, 'index']);
Route::get('/user', [UserController::class, 'show']);
Route::get('/tambah', [UserController::class, 'tambah']);

Route::get('/produk', [ProdukController::class, 'tampilProduk']);


Route::get('/produk/{produk:slug}', [PostController::class, 'tampilProduk']);

// route login page
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');



// route untuk CRUD
Route::resource('/dashboard/products', DashboardProdukController::class)->middleware('auth');