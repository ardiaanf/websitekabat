<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\umkmController;
use App\Http\Controllers\backend\bannerController;
use App\Http\Controllers\backend\beritaController;
use App\Http\Controllers\backend\desaController;
use App\Http\Controllers\backend\potensiDesaController;
use App\Http\Controllers\backend\strukturDesaController;
use App\Http\Controllers\backend\testController;
use App\Http\Controllers\backend\content;
use App\Http\Controllers\frontend\beritaUserController;
use App\Http\Controllers\frontend\pencarianController;
use Illuminate\Support\Facades\DB;



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

 Route::get('/home', function () {
  return view('user/home');
 });
Route::get('/strukturKecamatan', function () {
    return view('user/struktur');
});
Route::get('/pengaduan', function () {
    return view('user/pengaduan');
});
    Route::get('/home', [beritaUserController::class,'index'])->name('berita.user');
    Route::get('/detail_berita/{id}', [beritaUserController::class,'detail_berita']);
    Route::get('/desa',[pencarianController::class,'index']);
    Route::get('/desa/cari',[pencarianController::class,'cari']);

Route::prefix('umkm')->group(function(){
    Route::get('/view', [umkmController::class,'umkmView'])->name('umkm.view');
    Route::get('/add', [umkmController::class,'umkmAdd'])->name('umkm.add');
    Route::post('/store', [umkmController::class,'storeUmkm'])->name('umkmAdd.store');
});


Route::prefix('banner')->group(function(){
    Route::get('/view', [bannerController::class,'bannerView'])->name('banner.view'); 
    Route::post('/store', [bannerController::class,'store'])->name('banner.store'); 
    Route::get('/edit/{id_banner}', [bannerController::class, 'edit'])->name('banner.edit');
    Route::patch('/update/{id_banner}', [bannerController::class, 'update'])->name('banner.update');
    Route::delete('/destroy/{id_banner}', [bannerController::class, 'destroy'])->name('banner.destroy');

});
  



Route::prefix('berita')->group(function(){
    Route::get('/view', [beritacontroller::class,'index'])->name('berita.view');
    Route::get('/add', [beritacontroller::class,'create'])->name('berita.add');
    Route::post('/store', [beritacontroller::class,'store'])->name('berita.store');
    Route::get('/edit/{id}', [beritacontroller::class, 'edit'])->name('berita.edit');
    Route::put('/update/{id}', [beritacontroller::class, 'update'])->name('berita.update');
    Route::delete('/delete/{id}', [beritacontroller::class, 'destroy'])->name('berita.delete');
});
Route::prefix('desa')->group(function(){
    Route::get('/view', [desaController::class,'index'])->name('index.view'); 
    Route::post('/store', [desaController::class,'store'])->name('desa.store'); 
    Route::get('/edit/{id}', [desaController::class, 'edit'])->name('desa.edit');
    Route::patch('/update/{id}', [desaController::class, 'update'])->name('desa.update');
    Route::delete('/destroy/{id}', [desaController::class, 'destroy'])->name('desa.delete');
   

});

Route::prefix('potensiDesa')->group(function(){
    Route::get('/view', [potensiDesaController::class,'index'])->name('potensi.view'); 
    Route::get('/add', [potensiDesaController::class,'add'])->name('potensi.add');
    Route::post('/store', [potensiDesaController::class,'store'])->name('potensi.store');
    Route::get('/edit/{id}', [potensiDesaController::class, 'edit'])->name('potensi.edit');

});


// Route::prefix('banner')->group(function(){
//     Route::get('/view', [bannerController::class,'bannerView'])->name('banner.view');
//     Route::post('/store', [bannerController::class,'bannerView'])->name('banner.store');

Route::prefix('strukturDesa')->group(function(){
    Route::get('/view', [strukturDesaController::class,'index'])->name('indexDesa.view'); 
     Route::get('/add', [strukturDesaController::class,'add'])->name('struktur.add');
    Route::post('/store', [strukturDesaController::class,'store'])->name('struktur.store');
});


Route::prefix('test')->group(function(){
     Route::get('/view', [testController::class,'index'])->name('indextest.view'); 
     Route::get('/add', [testController::class,'add'])->name('test.add');
     Route::post('/store', [testController::class,'store'])->name('test.store');
});

//Route::post('/image/upload', [content::class, 'uploadImage'])->name('image.upload');





    