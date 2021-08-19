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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/auth/{name}/redirect', [\App\Http\Controllers\Auth\LoginController::class,'redirectToProvider']);
Route::get('/auth/{name}/callback', [\App\Http\Controllers\Auth\LoginController::class,'handleProviderCallback']);

//Route::get('/auth/google/redirect', [\App\Http\Controllers\Auth\LoginController::class,'googleRedirectToProvider']);
//Route::get('/auth/google/callback', [\App\Http\Controllers\Auth\LoginController::class,'googleHandleProviderCallback']);
Route::get('/channels', [App\Http\Controllers\ChannelController::class, 'index']);
Route::get('/create/post', [App\Http\Controllers\PostController::class, 'create']);
