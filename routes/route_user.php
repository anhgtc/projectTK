<?php

use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

//Frontend
Route::group(['namespace'=>'Frontend'], function(){
    //Homepage
    Route::get('',[HomeController::class,'index'])->name('get.home');
    //Category
    Route::prefix('category')->group(function(){
        //View all category
        Route::get('',[CategoryController::class,'index'])
            ->name('category.index');
        Route::get('/{id}',[CategoryController::class,'show'])
            ->name('category.show');
    });
    //Posts
    Route::prefix('post')->group(function(){
        //View all posts
        Route::get('',[PostController::class,'index'])
            ->name('post.index');
        //View post's detail
        Route::get('/{id}',[CategoryController::class,'show'])
            ->name('post.show');
    });
    //User
    Route::prefix('user')->group(function(){
        //Login
        Route::get('/login',[UserController::class,'login'])
            ->name('user.login');
        //Logout
        Route::get('/{id}/logout',[UserController::class,'logout'])
            ->name('user.logout');
        //Edit
        Route::get('/{id}/edit',[UserController::class,'edit'])
            ->name('user.edit');
    });
    //Comment

});
