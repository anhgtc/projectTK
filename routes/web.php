<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/{slug?}', function () {
    return view('welcome');
})->where('slug', '^.*$');
Route::get('/web/{slug?}', function () {
    return view('welcome');
})->where('slug', '^.*$');
Route::get('/user/{slug?}', function () {
    return view('welcome');
})->where('slug', '^.*$');
Route::get('/Posts/{slug?}', function () {
    return view('welcome');
})->where('slug', '^.*$');


//Backend
require __DIR__ . '/backend.php';

//Frontend
require __DIR__ . '/frontend.php';

// Route::get('/{slug?}', function () {
//     return view('welcome');
// })->where('slug', '^.*$');