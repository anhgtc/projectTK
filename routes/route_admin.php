<?php

use App\Http\Controllers\Backend\BackendCategoryController;
use App\Http\Controllers\Backend\BackendHomeController;
use App\Http\Controllers\Backend\BackendUserController;
use App\Http\Controllers\Backend\BackendPostController;
use App\Http\Controllers\Backend\BackendAdminController;
use App\Http\Controllers\Backend\BackendCommentController;
use Illuminate\Support\Facades\Route;
//Backend
Route::group(['namespace'=>'Backend', 'prefix'=>'admin'], function(){
    //Home
    Route::get('',[BackendHomeController::class,'index'])->name('backend.home');
    //Admin Login
    Route::get('/viewlogin',[BackendAdminController::class, 'viewLogin'])
        ->name('backend.adminviewlogin');
    Route::post('/login',[BackendAdminController::class, 'login'])
        ->name('backend.adminlogin');
    //Admin Logout
    Route::get('/logout',[BackendAdminController::class, 'logout'])
        ->name('backend.adminlogout');

    //Categories
    Route::prefix('category')->group(function(){
        //View all
        Route::get('',[BackendCategoryController::class,'index'])
            ->name('backend_category.index');
        //Create
        Route::get('/viewcreate',[BackendCategoryController::class,'create'])
            ->name('backend_category.viewcreate');
        Route::post('/create',[BackendCategoryController::class,'store'])
            ->name('backend_category.create');
        //Edit
        Route::get('/{id}/edit',[BackendCategoryController::class,'edit'])
            ->name('backend_category.edit');
        Route::post('/{id}',[BackendCategoryController::class, 'update'])
            ->name('backend_category.update');
        //Delete
        Route::get('/{id}/delete',[BackendCategoryController::class,'destroy'])
            ->name('backend_category.destroy');
    });
    //Users
    Route::prefix('user')->group(function(){
        //View user
        Route::get('',[BackendUserController::class,'index'])
            ->name('backend_user.index');
        //Create user
        Route::get('/viewcreate',[BackendUserController::class,'create'])
            ->name('backend_user.viewcreate');
        Route::post('/create',[BackendUserController::class,'store'])
            ->name('backend_user.create');
        //Edit user's detail
        Route::get('/{id}/edit',[BackendUserController::class,'edit'])
            ->name('backend_user.edit');
        Route::post('/{id}',[BackendUserController::class, 'update'])
            ->name('backend_user.update');
        //Delete user
        Route::get('/{id}/delete',[BackendUserController::class,'destroy'])
            ->name('backend_user.destroy');
    });
    //Posts
    Route::prefix('post')->group(function(){
        //View all post
        Route::get('',[BackendPostController::class,'index'])
            ->name('backend_post.index');
        //Create post
        Route::get('/viewcreate',[BackendPostController::class,'create'])
            ->name('backend_post.viewcreate');
        Route::post('/create',[BackendPostController::class,'store'])
            ->name('backend_post.create');
        //Edit post
        Route::get('/{id}/edit',[BackendPostController::class,'edit'])
            ->name('backend_post.edit');
        Route::post('/{id}',[BackendPostController::class, 'update'])
            ->name('backend_post.update');
        //Delete post
        Route::get('/{id}/delete',[BackendPostController::class,'destroy'])
            ->name('backend_post.destroy');
    });
    //Comments
    Route::prefix('comment')->group(function(){
        //View comment
        Route::get('/{id}',[BackendCommentController::class,'index'])
            ->name('backend_comment.index');
        //Delete comment
        Route::get('/{id}/delete',[BackendCommentController::class,'destroy'])
            ->name('backend_comment.destroy');
    });
});
