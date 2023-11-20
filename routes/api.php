<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReadUserController;
use App\Http\Controllers\CreateUserController;
use App\Http\Controllers\DeleteUserController;
use App\Http\Controllers\UpdateUserController;

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

Route::post('/users/store', [CreateUserController::class, 'store']);
Route::put('/users/update/{user}', [UpdateUserController::class, 'update']);
Route::delete('/users/delete/{user}', [DeleteUserController::class, 'destroy']);
Route::get('/users/read/{user}', [ReadUserController::class, 'show']);