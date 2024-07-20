<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EmpController;
use App\Http\Controllers\Api\RegController;

/*
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::apiResource('/students', EmpController_api::class);

Route::post('/reg-emp',[RegController::class, 'register']);
Route::post('/login',[RegController::class, 'login']);

Route::get('/employees', [EmpController::class, 'index']);
Route::post('/employees', [EmpController::class, 'store']);
Route::get('/employees/{id}', [EmpController::class, 'show']);
Route::get('/employees/{id}/edit', [EmpController::class, 'edit']);
Route::put('/employees/{id}/edit', [EmpController::class, 'update']);
Route::delete('/employees/{id}/delete', [EmpController::class, 'destroy']);



