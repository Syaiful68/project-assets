<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\ArmadaController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\RepairController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\CompeniesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/signin', [AuthController::class, 'signin'])->name('auth');

Route::middleware(['auth'])->group(function () {
    // logging out
    Route::delete('/signout', [AuthController::class, 'signout'])->name('logout');
    //  routes
    Route::resource('building', BuildingController::class);
    Route::resource('asset', AssetController::class);
    Route::resource('armada', ArmadaController::class);
    Route::resource('compeny', CompeniesController::class);
    Route::resource('repair', RepairController::class);
    Route::resource('user', UserController::class)->middleware('isRoles:Admin');

    // export Data
    Route::get('/export', [ExportController::class, 'index']);
    Route::get('/export/data', [ExportController::class, 'export']);

    // download file
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('isRoles:Admin');
});
