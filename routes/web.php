<?php

use App\Http\Controllers\ComponentInspectionController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\LocationObjectController;
use App\Http\Controllers\ObjectComponentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [LocationController::class, 'index']);
Route::get('/component/{id}', [LocationObjectController::class, 'index']);
Route::get('/object/{id}', [ObjectComponentController::class, 'index']);
Route::get('/inspection/{id}', [ComponentInspectionController::class, 'index']);