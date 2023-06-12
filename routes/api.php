<?php



use App\Http\Controllers\Api\V1\SystemController;
use App\Http\Controllers\Api\V1\SectorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::get('/sectors', [SectorController::class, 'index']);
    Route::post('/sectors', [SectorController::class, 'store']);
});

Route::prefix('v1')->group(function () {
    Route::get('/systems', [SystemController::class, 'index']);
});



//Route::get('/sectors', [SectorsController::class, 'index']);
//Route::post('/sectors', [SectorsController::class, 'store']);
