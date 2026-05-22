<?php

use App\Http\Controllers\SensorController;
use App\Http\Controllers\DeviceController;

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

use App\Models\Sensor;
use App\Models\Device;
use App\Http\Controllers\AuthController;

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Protected Routes
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        $totalSensors = Sensor::count();
        $totalDevices = Device::count();
        $latestSensors = Sensor::orderBy('id', 'desc')->take(5)->get();
        $latestDevices = Device::orderBy('id', 'desc')->take(5)->get();
        
        return view('welcome', compact('totalSensors', 'totalDevices', 'latestSensors', 'latestDevices'));
    });

    Route::get('/sensor', [SensorController::class, 'index']);
    Route::get('/sensor/create', [SensorController::class, 'create']);
    Route::post('/sensor', [SensorController::class, 'store']);
    Route::get('/sensor/{id}/edit', [SensorController::class, 'edit']);
    Route::put('/sensor/{id}', [SensorController::class, 'update']);
    Route::delete('/sensor/{id}', [SensorController::class, 'destroy']);

    Route::get('/device', [DeviceController::class, 'index']);
    Route::get('/device/create', [DeviceController::class, 'create']);
    Route::post('/device', [DeviceController::class, 'store']);
    Route::get('/device/{id}/edit', [DeviceController::class, 'edit']);
    Route::put('/device/{id}', [DeviceController::class, 'update']);
    Route::delete('/device/{id}', [DeviceController::class, 'destroy']);
});

Route::get('/db-test', function () {
    return Illuminate\Support\Facades\DB::select('DESCRIBE devices');
});
