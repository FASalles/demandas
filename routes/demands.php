<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemandsController;

Route::get('/demand', \App\Http\Livewire\DemandsIndex::class)
    ->name('demand.index');

Route::prefix('/demand')->name('demand.')->group(function() {

//Route::get('/index', [DemandsController::class, 'index'])->name('index');

Route::get('/create', [DemandsController::class, 'create'])->name('create');
Route::post('/create', [DemandsController::class, 'store'])->name('store');

Route::get('/{demand}/edit', [DemandsController::class, 'edit'])->name('edit');
Route::post('/update/{demand}', [DemandsController::class, 'update'])->name('update');

Route::post('/destroy/{demand}', [DemandsController::class, 'destroy'])->name('destroy');

//Route::middleware('auth')->resource('demand', \App\Http\Controllers\DemandsController::class);
});
