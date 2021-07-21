<?php

use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\UserController;
use Illuminate\Support\Facades\Route;

//Frontend
Route::group(['namespace'=>'Frontend'], function(){
    //Trang chủ
    Route::get('',[HomeController::class,'index'])->name('get.home');
    //Danh muc bai viet
    Route::prefix('category')->group(function(){
        //Hiển thị tất cả danh mục
        Route::get('',[CategoryController::class,'index'])
            ->name('category.index');
        Route::get('/{id}',[CategoryController::class,'show'])
            ->name('category.show');
    });
    //Bai viet
    Route::prefix('post')->group(function(){
        //Hiển thị tất cả bài viết
        Route::get('',[PostController::class,'index'])
            ->name('post.index');
        //Hiển thị chi tiết bài viết
        Route::get('/{id}',[CategoryController::class,'show'])
            ->name('post.show');
    });
    //Tài khaonr người dùng
    Route::prefix('user')->group(function(){
        //Đăng nhập
        Route::get('/login',[UserController::class,'login'])
            ->name('user.login');
        //Đăng xuất
        Route::get('/{i}/logout',[UserController::class,'logout'])
            ->name('user.logout');
        //Sửa thông tin tài khoản
        Route::get('/{i}/edit',[UserController::class,'edit'])
            ->name('user.edit');
    });
});
