<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\{
    KategoriPropertyController,
    PropertyController,
    AgentController,
};

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::post('/go-login', [AuthController::class, 'login'])->name("go_login");
// Route::get('/go-logout', [AuthController::class, 'logout'])->name("go_logout");

Route::get('/get-category', [KategoriPropertyController::class, 'index']);
Route::get('/get-property', [PropertyController::class, 'index']);
Route::get('/get-category-property', [KategoriPropertyController::class, 'categoryProperty']);
Route::get('/get-property-detail/{id}', [PropertyController::class, 'show']);
Route::get('/get-agents', [AgentController::class, 'index']);
Route::get('/get-agents-detail/{id}', [AgentController::class, 'detail']);

// Route::apiResource('categories', KategoriPropertyController::class);
// Route::apiResource('agents', AgentController::class);
// Route::apiResource('agent-details', AgentDetailController::class);
// Route::apiResource('properties', PropertyController::class);
// Route::apiResource('property-details', PropertyDetailController::class);