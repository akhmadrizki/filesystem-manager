<?php

use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use Illuminate\Support\Facades\Route;

Route::controller(DashboardController::class)
    ->prefix('dashboard')
    ->group(function () {
        Route::get('', 'index')->name('dashboard');
    });

Route::prefix('dashboard/project')
    ->name('dashboard.project.')
    ->controller(ProjectController::class)
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::post('store', 'store')->name('store');
    });
