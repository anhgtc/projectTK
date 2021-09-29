<?php

use App\Http\Controllers\Backend\BackendUserController;
use App\Http\Controllers\Backend\BackendPostController;
use App\Http\Controllers\Backend\BackendCategoryController;
use App\Http\Controllers\Backend\BackendCommentController;
use App\Http\Controllers\Backend\BackendAdminController;
use Illuminate\Support\Facades\Route;

//Admin
Route::get('/admin/login', [BackendAdminController::class, 'index']);
Route::post('/admin/login', [BackendAdminController::class, 'login']);
Route::get('/admin/Register', function () {
    return view('welcome');
});
Route::prefix('api/admin')->group(function () {
    Route::post('/register', [BackendAdminController::class, 'register'])
        ->name('admin.register');
});
Route::get('/admin/{slug?}', function () {
    return view('welcome');
})->where('slug', '^.*$')->middleware('admin');
Route::post('api/admin/logout', [BackendAdminController::class, 'logout'])
    ->middleware('admin');
//User
Route::group(['prefix' => 'api/admin/users', 'middleware' => 'admin'], function () {
    Route::get('/', [BackendUserController::class, 'index'])
        ->name('users.index');
    Route::post('/create', [BackendUserController::class, 'create'])
        ->name('users.create');
    Route::get('/{id}', [BackendUserController::class, 'show'])
        ->name('users.show');
    Route::post('/update/{id}', [BackendUserController::class, 'update'])
        ->name('users.update');
    Route::post('/delete/{id}', [BackendUserController::class, 'delete'])
        ->name('users.delete');
});
//Category
Route::group(['prefix' => 'api/admin/categories', 'middleware' => 'admin'], function () {
    Route::get('/', [BackendCategoryController::class, 'index'])
        ->name('categories.index');
    Route::post('/create', [BackendCategoryController::class, 'create'])
        ->name('categories.create');
    Route::get('/{id}', [BackendCategoryController::class, 'show'])
        ->name('categories.show');
    Route::post('/update/{id}', [BackendCategoryController::class, 'update'])
        ->name('categories.update');
    Route::post('/delete/{id}', [BackendCategoryController::class, 'delete'])
        ->name('categories.delete');
});
//Post
Route::group(['prefix' => 'api/admin/posts', 'middleware' => 'admin'], function () {
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
Route::group(['prefix' => 'api/admin/comments', 'middleware' => 'admin'], function () {
    Route::get('/', [BackendCommentController::class, 'index'])
        ->name('comments.index');
    Route::post('/delete/{id}', [BackendCommentController::class, 'delete'])
        ->name('comments.delete');
});