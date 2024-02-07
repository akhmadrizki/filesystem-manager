<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class)
    ->group(function () {
        Route::get('login', 'showLoginForm')->middleware(['guest'])->name('login.index');
        Route::post('login', 'login')->name('login.store');
        Route::delete('logout', 'logout')->name('logout');
    });
