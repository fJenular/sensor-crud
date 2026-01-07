<?php

use App\Http\Controllers\SensorController;

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

Route::get('/sensor', [SensorController::class, 'index']);
Route::get('/sensor/create', [SensorController::class, 'create']);
Route::post('/sensor', [SensorController::class, 'store']);
Route::get('/sensor/{id}/edit', [SensorController::class, 'edit']);
Route::put('/sensor/{id}', [SensorController::class, 'update']);
Route::delete('/sensor/{id}', [SensorController::class, 'destroy']);

