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



Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/posts/{post}', [\App\Http\Controllers\HomeController::class, 'show']);

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

Route::get('/demands', [\App\Http\Controllers\DemandsController::class, 'index'])->name('demands.index');
Route::get('/demands/create', [\App\Http\Controllers\DemandsController::class, 'create'])->name('demands.create');
Route::post('/demands/create', [\App\Http\Controllers\DemandsController::class, 'store'])->name('demands.store');








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
