<?php

use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\UserController;
use Illuminate\Support\Facades\Route;

//User
Route::get('/login', [UserController::class, 'index']);
Route::post('/login', [UserController::class, 'login']);
Route::prefix('api/web/users')->group(function () {
    Route::post('/register', [UserController::class, 'register'])
        ->name('webusers.register');
});
//Post
Route::prefix('api/web/posts')->group(function () {
    Route::get('/', [PostController::class, 'index'])
        ->name('webposts.index');
    Route::get('/{id}', [PostController::class, 'show'])
        ->name('webposts.show');
    Route::get('/find/{name}', [PostController::class, 'find'])
        ->name('webposts.find');
});