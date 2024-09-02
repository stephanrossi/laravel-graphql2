<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', [UserController::class, 'users']);
    Route::post('/users', [UserController::class, 'createUser']);
    Route::put('/users/{user}', [UserController::class, 'updateUser']);
    Route::delete('/users/{user}', [UserController::class, 'deleteUser']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
