<?php

use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\UseController;
use Illuminate\Support\Facades\Route;

//User

//Post
Route::prefix('api/web/posts')->group(function () {
    Route::get('/', [PostController::class, 'index'])
        ->name('webposts.index');
    Route::get('/{id}', [PostController::class, 'show'])
        ->name('webposts.show');
    Route::get('/find/{name}', [PostController::class, 'find'])
        ->name('webposts.find');
});