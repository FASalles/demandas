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
Route::get('/demand', [\App\Http\Controllers\DemandsController::class, 'index'])->name('demand.index');

Route::get('/demand/create', [\App\Http\Controllers\DemandsController::class, 'create'])->name('demand.create');
Route::post('/demand/create', [\App\Http\Controllers\DemandsController::class, 'store'])->name('demand.store');

Route::get('/demand/{demand}/edit', [\App\Http\Controllers\DemandsController::class, 'edit'])->name('demand.edit');
Route::post('/demand/update/{demand}', [\App\Http\Controllers\DemandsController::class, 'update'])->name('demand.update');

Route::get('/demand/destroy/{demand}', [\App\Http\Controllers\DemandsController::class, 'destroy'])->name('demand.destroy');

//Rotas CRUD para sectors
Route::get('/sector', [\App\Http\Controllers\SectorController::class, 'index'])->name('sector.index');

Route::get('/sector/create', [\App\Http\Controllers\SectorController::class, 'create'])->name('sector.create');
Route::post('/sector/create', [\App\Http\Controllers\SectorController::class, 'store'])->name('sector.store');

Route::get('/sector/{sector}/edit', [\App\Http\Controllers\SectorController::class, 'edit'])->name('sector.edit');
Route::post('/sector/update/{sector}', [\App\Http\Controllers\SectorController::class, 'update'])->name('sector.update');

Route::get('/sector/destroy/{sector}', [\App\Http\Controllers\SectorController::class, 'destroy'])->name('sector.destroy');

//Rotas CRUD para users
Route::get('/user', [\App\Http\Controllers\UserController::class, 'index'])->name('user.index');

Route::get('/user/create', [\App\Http\Controllers\UserController::class, 'create'])->name('user.create');
Route::post('/users/create', [\App\Http\Controllers\UserController::class, 'store'])->name('user.store');

Route::get('/user/{user}/edit', [\App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::post('/user/update/{user}', [\App\Http\Controllers\UserController::class, 'update'])->name('user.update');

Route::get('/user/destroy/{user}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');

//Rotas CRUD para systems
Route::get('/system', [\App\Http\Controllers\SystemController::class, 'index'])->name('system.index');

Route::get('/system/create', [\App\Http\Controllers\SystemController::class, 'create'])->name('system.create');
Route::post('/system/create', [\App\Http\Controllers\SystemController::class, 'store'])->name('system.store');

Route::get('/system/{system}/edit', [\App\Http\Controllers\SystemController::class, 'edit'])->name('system.edit');
Route::post('/system/update/{system}', [\App\Http\Controllers\SystemController::class, 'update'])->name('system.update');

Route::get('/system/destroy/{systems}', [\App\Http\Controllers\SystemController::class, 'destroy'])->name('system.destroy');








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
