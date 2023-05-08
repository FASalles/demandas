<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToolController;

function middleware(string $string)
{

}

Route::middleware('auth')->prefix('/tools')->name('tools.')->group(function() {

    Route::get('/index', [ToolController::class, 'index'])
        ->name('index')
        ->middleware('can:tools:show');
});
