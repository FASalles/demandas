<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return view('dashboard');
});


//Totas de teste
Route::get('/alpine', function () {
    return view('alpine');
});

//Rotas admin posts

//Route::prefix('/admin')->name('admin.')->group(function () {
//    Route::prefix('/posts')
//        ->name('posts.')
//        ->controller(App\Http\Controllers\Admin\PostsController::class)
//        ->group(function() {
//            Route::get('/', 'index')->name('index');
//            Route::get('/create', 'create')->name('create');
//            Route::post('/store', 'store')->name('store');
//    });
//});

//Rotas CRUD para demand

Route::prefix('/demand')->name('demand.')->group(function() {

    Route::get('/index', [\App\Http\Controllers\DemandsController::class, 'index'])->name('index');

    Route::get('/create', [\App\Http\Controllers\DemandsController::class, 'create'])->name('create');
    Route::post('/create', [\App\Http\Controllers\DemandsController::class, 'store'])->name('store');

    Route::get('/{demand}/edit', [\App\Http\Controllers\DemandsController::class, 'edit'])->name('edit');
    Route::post('/update/{demand}', [\App\Http\Controllers\DemandsController::class, 'update'])->name('update');
});

Route::get('/demand/destroy/{demand}', [\App\Http\Controllers\DemandsController::class, 'destroy'])->name('destroy');

//Rotas CRUD para sectors
//Route::prefix('/sector')->name('sector.')->group(function() {
//    Route::get('/index', [\App\Http\Controllers\SectorController::class, 'index'])->name('index');
//
//    Route::get('/create', [\App\Http\Controllers\SectorController::class, 'create'])->name('create');
//    Route::post('/create', [\App\Http\Controllers\SectorController::class, 'store'])->name('store');
//
//    Route::get('/{sector}/edit', [\App\Http\Controllers\SectorController::class, 'edit'])->name('edit');
//    Route::post('/update/{sector}', [\App\Http\Controllers\SectorController::class, 'update'])->name('update');
//
//    Route::get('/destroy/{sector}', [\App\Http\Controllers\SectorController::class, 'destroy'])->name('destroy');

Route::resource('sector', \App\Http\Controllers\SectorController::class);


//Rotas CRUD para users
//Route::prefix('/user')->name('user.')->group(function() {
//    Route::get('/index', [\App\Http\Controllers\UserController::class, 'index'])->name('index');
//
//    Route::get('/create', [\App\Http\Controllers\UserController::class, 'create'])->name('create');
//    Route::post('/create', [\App\Http\Controllers\UserController::class, 'store'])->name('store');
//
//    Route::get('/{user}/edit', [\App\Http\Controllers\UserController::class, 'edit'])->name('edit');
//    Route::post('/update/{user}', [\App\Http\Controllers\UserController::class, 'update'])->name('update');
//
//    Route::get('/destroy/{user}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('destroy');
//
Route::resource('user', \App\Http\Controllers\UserController::class);


//Rotas CRUD para systems

//Route::prefix('/system')->name('system.')->group(function() {

//    Route::get('/index', [\App\Http\Controllers\SystemController::class, 'index'])->name('index');
//
//    Route::get('/create', [\App\Http\Controllers\SystemController::class, 'create'])->name('create');
//    Route::post('/create', [\App\Http\Controllers\SystemController::class, 'store'])->name('store');
//
//    Route::get('/{system}/edit', [\App\Http\Controllers\SystemController::class, 'edit'])->name('edit');
//    Route::post('/update/{system}', [\App\Http\Controllers\SystemController::class, 'update'])->name('update');
//
//    Route::get('/destroy/{systems}', [\App\Http\Controllers\SystemController::class, 'destroy'])->name('destroy');

    Route::resource('system', \App\Http\Controllers\SystemController::class);












//Rotas do Breeze
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
