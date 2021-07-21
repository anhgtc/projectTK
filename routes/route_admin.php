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
    //Trang chủ
    Route::get('',[BackendHomeController::class,'index'])->name('backend.home');
    //Admin đăng nhập
    Route::get('/login',[BackendAdminController::class, 'login'])
        ->name('backend.adminlogin');
    //Admin đăng xuất
    Route::get('/logout',[BackendAdminController::class, 'logout'])
        ->name('backend.adminlogout');

    //Quản lí các thể loại
    Route::prefix('category')->group(function(){
        //Hiển thị tất cả thể loại
        Route::get('',[BackendCategoryController::class,'index'])
            ->name('backend_category.index');
        //Thêm mới thể loại
        Route::get('/create',[BackendCategoryController::class,'create'])
            ->name('backend_category.create');
        //Hiển thị chi tiết thể loại
        // Route::get('/{id}',[BackendCategoryController::class,'show'])
        //     ->name('backend_category.show');
        //Sửa
        // Route::get('/{id}/edit',[BackendCategoryController::class,'edit'])
        //     ->name('backend_category.edit');
        // Route::put('/{id}',[BackendCategoryController::class, 'update'])
        //     ->name('backend_category.update');
        //Xóa thể loại
        // Route::delete('/{id}/delete',[BackendCategoryController::class,'destroy'])
        //     ->name('backend_category.destroy');
    });
    //Quản lí người dùng
    Route::prefix('user')->group(function(){
        //Hiển thị tất cả người dùng
        Route::get('',[BackendUserController::class,'index'])
            ->name('backend_user.index');
        //Thêm mới người dùng
        Route::get('/create',[BackendUserController::class,'create'])
            ->name('backend_user.create');
        //Hiển thị chi tiết người dùng
        // Route::get('/{id}',[BackendUserController::class,'show'])
        //     ->name('backend_user.show');
        //Sửa thông tin người dùng
        // Route::get('/{id}/edit',[BackendUserController::class,'edit'])
        //     ->name('backend_user.edit');
        // Route::put('/{id}',[BackendUserController::class, 'update'])
        //     ->name('backend_user.update');
        //Xóa người dùng
        // Route::delete('/{id}/delete',[BackendUserController::class,'destroy'])
        //     ->name('backend_user.destroy');
    });
    //Quản lí bài viết
    Route::prefix('post')->group(function(){
        //Hiển thị tất cả bài viết
        Route::get('',[BackendPostController::class,'index'])
            ->name('backend_post.index');
        //Thêm mới bài viết
        Route::get('/create',[BackendPostController::class,'create'])
            ->name('backend_post.create');
        //Hiển thị chi tiết bài viết
        // Route::get('/{id}',[BackendPostController::class,'show'])
        //     ->name('backend_post.show');
        //Sửa bài viết
        // Route::get('/{id}/edit',[BackendPostController::class,'edit'])
        //     ->name('backend_post.edit');
        // Route::put('/{id}',[BackendPostController::class, 'update'])
        //     ->name('backend_post.update');
        //Xóa bài viết
        // Route::delete('/{id}/delete',[BackendPostController::class,'destroy'])
        //     ->name('backend_post.destroy');
    });
    //Quản lí bình luận
    Route::prefix('comment')->group(function(){
        //Thêm bình luận mới
        Route::get('/create',[BackendCommentController::class,'create'])
            ->name('backend_comment.create');
        //Hiển thị bình luận theo bài viết
        // Route::get('/{id}',[BackendCommentController::class,'show'])
        //     ->name('backend_comment.show');
        //Sửa bình luận
        // Route::get('/{id}/edit',[BackendCommentController::class,'edit'])
        //     ->name('backend_comment.edit');
        // Route::put('/{id}',[BackendCommentController::class, 'update'])
        //     ->name('backend_comment.update');
        //Xóa bình luận
        // Route::delete('/{id}/delete',[BackendCommentController::class,'destroy'])
        //     ->name('backend_comment.destroy');
    });
});
