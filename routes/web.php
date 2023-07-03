<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\backend\umkmController;
use App\Http\Controllers\backend\beritaController;
use App\Http\Controllers\backend\desaController;
use App\Http\Controllers\backend\potensiDesaController;
use App\Http\Controllers\backend\strukturDesaController;
use App\Http\Controllers\backend\strukturKecController;
use App\Http\Controllers\backend\unggahFileController;
use App\Http\Controllers\backend\dashboardController;
use App\Http\Controllers\backend\userController;
use App\Http\Controllers\backend\fotoProfilController;
use App\Http\Controllers\backend\pengumumanController;
use App\http\Controllers\frontend\homeController;
use App\Http\Controllers\backend\messageController;

Route::get('/clear-user-sent-message-session', [messageController::class, 'clearUserSentMessageSession'])
    ->name('clear.user-sent-message-session');

Route::get('/', [messageController::class, 'userIndex'])->name('home');
Route::post('/user/live-chat/send-message', [messageController::class, 'userSendMessage'])->name('user.live-chat.send-message');
Route::post('/user/live-chat/reply-message/{id}', [messageController::class, 'userReplyMessage'])->name('user.live-chat.reply-message');



Route::get('/login', [UserController::class, 'showLoginForm'])->middleware(['guest'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.post');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

Route::get('/admin/live-chat', [messageController::class, 'adminIndex'])->name('admin.live-chat');
Route::post('/admin/live-chat/send-message', [messageController::class, 'adminSendMessage'])->name('admin.live-chat.send-message');
Route::post('/admin/live-chat/reply-message/{id}', [messageController::class, 'adminReplyMessage'])->name('admin.live-chat.reply-message');

    Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');

    Route::prefix('unggahFile')->group(function(){
        Route::get('/view', [unggahFileController::class,'index'])->name('unggah.view');
        Route::get('/add', [unggahFileController::class,'add'])->name('unggah.add');
        Route::post('/store', [unggahFileController::class,'store'])->name('unggah.store');
        Route::get('/show/{id}', [unggahFileController::class,'show'])->name('unggah.show');
        Route::get('/edit/{id}', [unggahFileController::class, 'edit'])->name('unggah.edit');
        Route::post('/update/{id}', [unggahFileController::class, 'update'])->name('unggah.update');
        Route::get('/delete/{id}', [unggahFileController::class, 'delete'])->name('unggah.delete');
        Route::get('/download/{id}', [unggahFileController::class,'download'])->name('unggah.download');
    });

    Route::prefix('strukturKec')->group(function(){
        Route::get('/view', [strukturKecController::class,'index'])->name('struKec.view');
        Route::get('/add', [strukturKecController::class,'add'])->name('struKec.add');
        Route::post('/store', [strukturKecController::class,'store'])->name('struKec.store');
        Route::get('/edit/{id}', [strukturKecController::class, 'edit'])->name('struKec.edit');
        Route::post('/update/{id}', [strukturKecController::class, 'update'])->name('struKec.update');
        Route::get('/delete/{id}', [strukturKecController::class, 'delete'])->name('struKec.delete');
    });

    Route::prefix('umkm')->group(function(){
        Route::get('/view', [umkmController::class,'index'])->name('umkm.view');
        Route::get('/add', [umkmController::class,'create'])->name('umkm.add');
        Route::post('/store', [umkmController::class,'store'])->name('umkm.store');
        Route::get('/show/{id}', [umkmController::class,'show'])->name('umkm.show');
        Route::get('/edit/{id}', [umkmController::class, 'edit'])->name('umkm.edit');
        Route::post('/update/{id}', [umkmController::class, 'update'])->name('umkm.update');
        Route::get('/delete/{id}', [umkmController::class, 'delete'])->name('umkm.delete');
    });

    Route::prefix('berita')->group(function(){
        Route::get('/view', [beritaController::class,'index'])->name('berita.view');
        Route::get('/add', [beritaController::class,'create'])->name('berita.add');
        Route::post('/store', [beritaController::class,'store'])->name('berita.store');
        Route::get('/show/{id}', [beritaController::class,'show'])->name('berita.show');
        Route::get('/edit/{id}', [beritaController::class, 'edit'])->name('berita.edit');
        Route::post('/update/{id}', [beritaController::class, 'update'])->name('berita.update');
        Route::get('/delete/{id}', [beritaController::class, 'destroy'])->name('berita.delete');
    });

    Route::prefix('desa')->group(function(){
        Route::get('/view', [desaController::class,'index'])->name('desa.view');
        Route::get('/show/{id}', [desaController::class,'show'])->name('desa.show');
        Route::post('/store', [desaController::class,'store'])->name('desa.store');
        Route::get('/edit/{id}', [desaController::class, 'edit'])->name('desa.edit');
        Route::post('/update/{id}', [desaController::class, 'update'])->name('desa.update');
        Route::get('/delete/{id}', [desaController::class, 'delete'])->name('desa.delete');
    });

    Route::prefix('strukturDesa')->group(function(){
        Route::get('/view', [strukturDesaController::class,'index'])->name('struktur.view');
        Route::get('/add', [strukturDesaController::class,'add'])->name('struktur.add');
        Route::post('/store', [strukturDesaController::class,'store'])->name('struktur.store');
        Route::get('/edit/{id}', [strukturDesaController::class, 'edit'])->name('struktur.edit');
        Route::post('/update/{id}', [strukturDesaController::class, 'update'])->name('struktur.update');
        Route::get('/delete/{id}', [strukturDesaController::class, 'delete'])->name('struktur.delete');
    });

    Route::prefix('potensiDesa')->group(function(){
        Route::get('/view', [potensiDesaController::class,'index'])->name('potensi.view');
        Route::get('/add', [potensiDesaController::class,'add'])->name('potensi.add');
        Route::post('/store', [potensiDesaController::class,'store'])->name('potensi.store');
        Route::get('/show/{id}', [potensiDesaController::class,'show'])->name('potensi.show');
        Route::get('/edit/{id}', [potensiDesaController::class, 'edit'])->name('potensi.edit');
        Route::post('/update/{id}', [potensiDesaController::class, 'update'])->name('potensi.update');
        Route::get('/delete/{id}', [potensiDesaController::class, 'delete'])->name('potensi.delete');
    });

    Route::prefix('pengumuman')->group(function(){
        Route::get('/view', [pengumumanController::class,'index'])->name('pengumuman.view');
        Route::post('/store', [pengumumanController::class,'store'])->name('pengumuman.store');
        Route::get('/show/{id}', [pengumumanController::class,'show'])->name('pengumuman.show');
        Route::get('/edit/{id}', [pengumumanController::class, 'edit'])->name('pengumuman.edit');
        Route::post('/update/{id}', [pengumumanController::class, 'update'])->name('pengumuman.update');
        Route::get('/delete/{id}', [pengumumanController::class, 'delete'])->name('pengumuman.delete');
    });
});





    