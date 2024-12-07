<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArticleController;

// Route untuk semua pengguna yang terautentikasi
Route::middleware(['auth'])->group(function () {
    Route::resource('articles', ArticleController::class);
});

// Rute untuk admin yang memiliki akses ke edit dan delete
Route::middleware(['role:admin'])->group(function () {
    Route::get('articles/{article}/edit', [ArticleController::class, 'edit']);
    Route::patch('articles/{article}', [ArticleController::class, 'update']);
    Route::delete('articles/{article}', [ArticleController::class, 'destroy']);
});

