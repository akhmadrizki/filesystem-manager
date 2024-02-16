<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return inertia('welcome');
});

Route::get('docs', function () {
    $title = 'Documentation';
    $file = url('doc/docs.yaml') . '?v=' . md5_file(public_path('doc/docs.yaml'));

    return view('docs', compact('title', 'file'));
})->name('docs');
