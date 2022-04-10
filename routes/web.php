<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

Route::get('/', [HomeController::class, 'show_post'])->name('home');

// Route::get('/dashboard', [DashboardController::class, 'show_post'])->middleware(['auth'])->name('dashboard');

// Route::get('/post', [PostController::class, 'index'])->middleware(['auth'])->name('post_index');
// Route::post('/post', [PostController::class, 'create'])->middleware(['auth'])->name('post_create');
// Route::get('/post/edit/{id}', [PostController::class, 'edit'])->middleware(['auth'])->name('post_edit');
// Route::put('/post/edit/{id}', [PostController::class, 'update'])->middleware(['auth'])->name('post_update');
// Route::get('/post/delete/{id}', [PostController::class, 'destroy'])->middleware(['auth'])->name('post_delete');

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'show_post'])->name('dashboard');

    Route::get('/post', [PostController::class, 'index'])->name('post_index');
    Route::post('/post', [PostController::class, 'create'])->name('post_create');
    Route::get('/post/edit/{id}', [PostController::class, 'edit'])->name('post_edit');
    Route::put('/post/edit/{id}', [PostController::class, 'update'])->name('post_update');
    Route::get('/post/delete/{id}', [PostController::class, 'destroy'])->name('post_delete');
});

require __DIR__.'/auth.php';
