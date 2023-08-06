<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ArticleController::class, 'index']);
Route::get('/preview', [ArticleController::class, 'preview']);
Route::get('/add', [ArticleController::class, 'add']);
Route::get('/edit/{id}', [ArticleController::class, 'edit']);

Route::prefix('article')->group(function(){
});
