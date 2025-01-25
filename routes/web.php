<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login',[AdminController::class,'login']);
Route::post('/login',[AdminController::class,'authenticate'])->name('authenticate');
Route::get('/logout',[AdminController::class,'logout'])->name('logout');

Route::resource('post',PostController::class);
Route::get('/fetchpost',[PostController::class,'fetchPost']);
