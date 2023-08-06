<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ArticleController;

Route::group(['prefix' => 'v1', 'middleware' => ['throttle:60,1']], function() {
    Route::group(['prefix' => 'article'], function() {
        Route::post('/', [ArticleController::class, 'add']);
        Route::get('/{limit}/{offset}', [ArticleController::class, 'list']);
        Route::get('/{id}', [ArticleController::class, 'detail']);
        Route::post('/{id}', [ArticleController::class, 'edit']);
        Route::delete('/{id}', [ArticleController::class, 'delete']);
    });
});
