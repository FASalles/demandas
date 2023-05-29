<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;

Route::get('/', function () {
    return view('dashboard');
});



Route::get('/pdfUsers', [PdfController::class, 'geraPdfUsers'])->name('pdf');
Route::get('/pdfSectors', [PdfController::class, 'geraPdfSectors'])->name('pdf');
Route::get('/pdfSystems', [PdfController::class, 'geraPdfSystems'])->name('pdf');
Route::get('/pdfDemands', [PdfController::class, 'geraPdfDemands'])->name('pdf');



require __DIR__.'/demands.php';
require __DIR__.'/sectors.php';
require __DIR__.'/systems.php';
require __DIR__.'/users.php';
require __DIR__.'/breeze.php';
require __DIR__.'/auth.php';
require __DIR__.'/tools.php';

