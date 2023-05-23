<?php

use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});




require __DIR__.'/demands.php';
require __DIR__.'/sectors.php';
require __DIR__.'/systems.php';
require __DIR__.'/users.php';
require __DIR__.'/breeze.php';
require __DIR__.'/auth.php';
require __DIR__.'/tools.php';

