<?php

use App\Http\Controllers\Backend\BackendUserController;
use App\Http\Controllers\Backend\BackendPostController;
use App\Http\Controllers\Backend\BackendCategoryController;
use App\Http\Controllers\Backend\BackendCommentController;
use Illuminate\Support\Facades\Route;

//User
Route::prefix('api/admin/users')->group(function() {
    Route::get('/', [BackendUserController::class, 'index'])
        ->name('users.index');
    Route::post('/create', [BackendUserController::class,'create'])
        ->name('users.create');
    Route::get('/{id}', [BackendUserController::class, 'show'])
        ->name('users.show');
    Route::post('/update/{id}', [BackendUserController::class, 'update'])
        ->name('users.update');
    Route::post('/delete/{id}', [BackendUserController::class, 'delete'])
        ->name('users.delete');
});
//Category
Route::prefix('api/admin/categories')->group(function() {
    Route::get('/', [BackendCategoryController::class, 'index'])
        ->name('categories.index');
    Route::post('/create', [BackendCategoryController::class,'create'])
        ->name('categories.create');
    Route::get('/{id}', [BackendCategoryController::class, 'show'])
        ->name('categories.show');
    Route::post('/update/{id}', [BackendCategoryController::class, 'update'])
        ->name('categories.update');
    Route::post('/delete/{id}', [BackendCategoryController::class, 'delete'])
        ->name('categories.delete');
});
//Post
Route::prefix('api/admin/posts')->group(function() {
    Route::get('/', [BackendPostController::class, 'index'])
        ->name('posts.index');
    Route::get('/viewcreate', [BackendPostController::class, 'viewCreate'])
        ->name('post.viewcreate');
    Route::post('/create', [BackendPostController::class, 'create'])
        ->name('post.create');
    Route::get('/{id}', [BackendPostController::class, 'show'])
        ->name('posts.show');
    Route::post('/update/{id}', [BackendPostController::class, 'update'])
        ->name('posts.update');
    Route::post('/delete/{id}', [BackendPostController::class, 'delete'])
        ->name('posts.delete');
});
//Comment
Route::prefix('api/admin/comments')->group(function() {
    Route::get('/', [BackendCommentController::class, 'index'])
        ->name('comments.index');
    Route::post('/delete/{id}', [BackendCommentController::class, 'delete'])
        ->name('comments.delete');
});
