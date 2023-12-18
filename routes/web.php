<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\AdminImagesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[BasicController::class, 'index']);

Route::get('register' , [RegisterController::class, 'create'])->middleware('guest');
Route::post('register' , [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::middleware('can:admin')->group(function () {
    Route::get('admin/images', [AdminImagesController::class, 'index']);
    Route::get('admin/images/upload', [AdminImagesController::class, 'create']);
    Route::post('admin/images', [AdminImagesController::class, 'store']);
});