<?php

use App\Http\Controllers\XhrController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('xhr')->group(function () {
    Route::post('/add-location', [XhrController::class, 'addLocation']);
    Route::post('/add-object', [XhrController::class, 'addObject']);
    Route::post('/add-component', [XhrController::class, 'addComponent']);
    Route::post('/add-inspection', [XhrController::class, 'addInspection']);
    Route::post('/delete', [XhrController::class, 'delete']);
});