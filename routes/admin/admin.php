<?php

use Illuminate\Support\Facades\Route;

require_once __DIR__.'/auth.php';

Route::middleware([
    'auth',
])->group(function () {
    require_once __DIR__.'/dashboard.php';
});
