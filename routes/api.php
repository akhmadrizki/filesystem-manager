<?php

use App\Http\Controllers\DirectoryController;
use App\Http\Controllers\FileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('files')->group(function () {
    Route::post('upload', [FileController::class, 'upload'])->middleware('authorize_access_token');
    Route::delete('delete', [FileController::class, 'delete'])->middleware('authorize_access_token');
    Route::get('presigned/{file}', [FileController::class, 'presigned'])->name('presigned');
});

Route::prefix('directories')->group(function () {
    Route::post('contents', [DirectoryController::class, 'contents'])->middleware('authorize_access_token');
    Route::post('create', [DirectoryController::class, 'create'])->middleware('authorize_access_token');
    Route::post('delete', [DirectoryController::class, 'delete'])->middleware('authorize_access_token');
});
