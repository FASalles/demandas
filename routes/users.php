<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::prefix('/user')->name('user.')->group(function() {
Route::get('/index', [UserController::class, 'index'])->name('index');

Route::get('/create', [UserController::class, 'create'])->name('create');
Route::post('/create', [UserController::class, 'store'])->name('store');

Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
Route::post('/update/{user}', [UserController::class, 'update'])->name('update');

Route::post('/destroy/{user}', [UserController::class, 'destroy'])->name('destroy');

//Route::middleware('auth')->resource('user', \App\Http\Controllers\UserController::class);
});
