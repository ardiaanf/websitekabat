<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\umkmController;
use App\Http\Controllers\backend\bannerController;
use App\Http\Controllers\backend\desaController;
use App\Http\Controllers\backend\potensiDesaController;


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

Route::prefix('banner')->group(function(){
    Route::get('/view', [bannerController::class,'bannerView'])->name('banner.view'); 
    Route::post('/store', [bannerController::class,'store'])->name('banner.store'); 
    Route::get('/edit/{id_banner}', [bannerController::class, 'edit'])->name('banner.edit');
    Route::patch('/update/{id_banner}', [bannerController::class, 'update'])->name('banner.update');
    Route::delete('/destroy/{id_banner}', [bannerController::class, 'destroy'])->name('banner.destroy');
  

});
Route::prefix('desa')->group(function(){
    Route::get('/view', [desaController::class,'index'])->name('index.view'); 
    Route::post('/store', [desaController::class,'store'])->name('desa.store'); 
   

});

Route::prefix('potensiDesa')->group(function(){
    Route::get('/view', [potensiDesaController::class,'potensiDesaView'])->name('potensi.view'); 
    Route::get('/add', [potensiDesaController::class,'potensiAdd'])->name('potensi.add');
    Route::post('/store', [potensiDesaController::class,'store'])->name('potensi.store');

});



