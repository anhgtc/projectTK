<?php

use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\CommentController;
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
        Route::get('/{id}',[PostController::class,'show'])
            ->name('post.show');
        //Show posts by category
        Route::get('/category/{name}',[PostController::class,'byCategory'])
            ->name('post.category');
    });
    //User
    Route::prefix('user')->group(function(){
        //Login
        Route::get('/login',[UserController::class,'login'])
            ->name('user.login');
        Route::post('/cflogin',[UserController::class,'confirmLogin'])
            ->name('user.cflogin');
        //Logout
        Route::get('/logout',[UserController::class,'logout'])
            ->name('user.logout');
        //Register
        Route::get('/register',[UserController::class,'register'])
            ->name('user.register');
        Route::post('/cfregister',[UserController::class,'confirmRegister'])
            ->name('user.cfregister');
    });
    //Comment
    Route::prefix('comment')->group(function(){
        Route::post('/{id}',[CommentController::class,'store'])
            ->name('comment.store');
    });

});
