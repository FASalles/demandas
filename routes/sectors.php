<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SectorController;
use App\Http\Livewire\SectorsIndex as SectorsIndex;

Route::middleware('auth')->get('/sector', \App\Http\Livewire\SectorsIndex::class)
    ->name('sector.index');

Route::middleware('auth')->prefix('/sector')->name('sector.')->group(function() {

//    Route::get('/', SectorsIndex::class)->name('sectors.index');


//    Route::get('/index', [SectorController::class, 'index'])->name('index');

    Route::get('/create', [SectorController::class, 'create'])->name('create');
    Route::post('/create', [SectorController::class, 'store'])->name('store');

    Route::get('/{sector}/edit', [SectorController::class, 'edit'])->name('edit');
    Route::post('/update/{sector}', [SectorController::class, 'update'])->name('update');

    Route::post('/destroy/{sector}', [SectorController::class, 'destroy'])->name('destroy');
});

//Route::middleware('auth')->resource('sector', \App\Http\Controllers\SectorController::class;

