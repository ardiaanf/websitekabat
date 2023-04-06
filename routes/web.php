<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\umkmController;
use App\Http\Controllers\backend\bannerController;
use App\Http\Controllers\backend\beritacontroller;
use App\Http\Controllers\backend\desa\namadesaController;

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
    return view('frontends/index');
});


Route::get('/dashboard', function () {
    return view('backends.index');
});
Route::get('/namadesa', function () {
    return view('admin.desa.namadesa.view');
});
Route::get('/potensidesa', function () {
    return view('admin.desa.potensidesa.view');
});
Route::get('/strukturdesa', function () {
    return view('admin.desa.strukturdesa.view');
});
Route::get('/bagan', function () {
    return view('admin.kecamatan.bagan.view');
});

Route::prefix('admin-desa')->group(function(){
    // nama desa
    Route::get('nama-desa/view', [namadesaController::class,'index'])->name('namadesa.view');
    // Route::get('nama-desa/add', [namadesaController::class,'create'])->name('namadesa.add');
    // Route::post('nama-desa/store', [namadesaController::class,'store'])->name('namadesa.store');
});

Route::prefix('admin-umkm')->group(function(){
    Route::get('/view', [umkmController::class,'umkmView'])->name('umkm.view');
    Route::get('/add', [umkmController::class,'umkmAdd'])->name('umkm.add');
    Route::post('/store', [umkmController::class,'storeUmkm'])->name('umkmAdd.store');
});

// berita admin
Route::prefix('admin-berita')->group(function(){
    Route::get('/view', [beritacontroller::class,'index'])->name('berita.view');
    Route::get('/add', [beritacontroller::class,'create'])->name('berita.add');
    Route::post('/store', [beritacontroller::class,'store'])->name('berita.store');
    Route::get('/edit/{id}', [beritacontroller::class, 'edit'])->name('berita.edit');
    Route::put('/update/{id}', [beritacontroller::class, 'update'])->name('berita.update');
    Route::delete('/delete/{id}', [beritacontroller::class, 'destroy'])->name('berita.delete');
});

Route::prefix('banner')->group(function(){
    Route::get('/view', [bannerController::class,'bannerView'])->name('banner.view');
    Route::post('/store', [bannerController::class,'store'])->name('banner.store');
    // Route::get('/edit/{id}', [beritacontroller::class, 'edit'])->name('berita.edit');
    // Route::put('/update/{id}', [beritacontroller::class, 'update'])->name('berita.update');
    Route::delete('/delete/{id}', [bannerController::class, 'destroy'])->name('banner.delete');
});


