<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriPropertyController;

Route::get('/lg', [AuthController::class, 'loginView'])->name('login');
Route::get('/', [DashboardController::class, 'dashboardView'])->name('dashboard');

// Route::get('/', [PropertyController::class, 'propertyCreateView'])->name('property-create');


Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Route::post('/go-login', [AuthController::class, 'login'])->name("go_login");
Route::get('/go-logout', [AuthController::class, 'logout'])->name("go_logout");

// Route::post('/properties-store', [PropertyController::class, 'store'])->name("properties-store");

Route::resource('properties', PropertyController::class);
Route::resource('agents', AgentController::class);
Route::resource('kategori', KategoriPropertyController::class);