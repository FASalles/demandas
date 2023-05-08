<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SystemController;

Route::middleware('auth')->get('/system', \App\Http\Livewire\SystemsIndex::class)
    ->name('system.index');

Route::middleware('auth')->prefix('/system')->name('system.')->group(function() {

//    Route::get('/index', [SystemController::class, 'index'])->name('index');

    Route::get('/create', [SystemController::class, 'create'])->name('create');
    Route::post('/create', [SystemController::class, 'store'])->name('store');

    Route::get('/{system}/edit', [SystemController::class, 'edit'])->name('edit');
    Route::post('/update/{system}', [SystemController::class, 'update'])->name('update');

    Route::post('/destroy/{system}', [SystemController::class, 'destroy'])->name('destroy');

//    Route::middleware('auth')->resource('system', \App\Http\Controllers\SystemController::class);

});
