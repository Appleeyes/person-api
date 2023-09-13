<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;

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

Route::resource('/', PersonController::class);

// Custom routes for reading, updating, and deleting a person (GET, PUT, DELETE)
Route::get('/{id}', [PersonController::class, 'show']);
Route::put('/{id}', [PersonController::class, 'update']);
Route::delete('/{id}', [PersonController::class, 'destroy']);


