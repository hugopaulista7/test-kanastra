<?php

use App\Http\Controllers\FilesController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\Cors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::middleware(Cors::class)->group(function () {
    Route::post('/import-users', [UsersController::class, 'import'])->name('import-users');
    Route::get('/imported', [FilesController::class, 'index'])->name('list-imported');
});
