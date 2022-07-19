<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\{
    BarangController,
    DashboardController,
    KategoriController,
    ContactController
};

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
//     return view('/layout');
// });
Route::get('/', [DashboardController::class, 'index']);
Route::resource('/dashboard', DashboardController::class);
Route::get('/kategori/data', [KategoriController::class, 'data'])->name('kategori.data');
Route::resource('/kategori', KategoriController::class);
Route::get('/barang/data', [BarangController::class, 'data'])->name('barang.data');
Route::resource('/barang', BarangController::class);
Route::resource('/contact', ContactController::class);

