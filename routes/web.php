<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\umkmController;
use App\Http\Controllers\backend\bannerController;
use App\Http\Controllers\backend\beritacontroller;


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




Route::prefix('umkm')->group(function(){
    Route::get('/view', [umkmController::class,'umkmView'])->name('umkm.view');
    Route::get('/add', [umkmController::class,'umkmAdd'])->name('umkm.add');
    Route::post('/store', [umkmController::class,'storeUmkm'])->name('umkmAdd.store');
});

// berita admin
Route::prefix('berita')->group(function(){
    Route::get('/view', [beritacontroller::class,'index'])->name('berita.view');
    Route::get('/add', [beritacontroller::class,'create'])->name('berita.add');
    Route::post('/store', [beritacontroller::class,'store'])->name('berita.store');
    Route::get('/edit/{id}', [beritacontroller::class, 'edit'])->name('berita.edit');
    Route::put('/update/{id}', [beritacontroller::class, 'update'])->name('berita.update');
    Route::delete('/delete/{id}', [beritacontroller::class, 'destroy'])->name('berita.delete');
});

Route::prefix('banner')->group(function(){
    Route::get('/view', [bannerController::class,'bannerView'])->name('banner.view');
    Route::post('/store', [bannerController::class,'bannerView'])->name('banner.store');


});


