<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;


// Route untuk mengambil user yang terautentikasi
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// Route untuk login dan logout
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/register', [AuthController::class, 'register']);

// Route yang memerlukan autentikasi
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/orders', [OrderController::class, 'index']);
    Route::post('/orders', [OrderController::class, 'store']);
    Route::post('/tasks', [TaskController::class, 'store']);

});


// Route::middleware('auth:sanctum')->post('/orders', [OrderController::class, 'store']);


// Route default untuk tes
Route::get('/', function () {
    return response()->json(['message' => 'API is working']);
});
