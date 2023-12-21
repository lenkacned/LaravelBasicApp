<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\AdminImageController;

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

Route::get('/',[ImageController::class, 'index']);
Route::get('images/{image:slug}', [ImageController::class, 'show']);
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::middleware('guest')->group(function () {
    Route::get('register' , [RegisterController::class, 'create']);
    Route::post('register' , [RegisterController::class, 'store']);
    Route::get('login', [SessionsController::class, 'create']);
    Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');
});

Route::middleware('can:admin')->group(function () {
    //special admin settings page
    Route::get('admin/images', [AdminImageController::class, 'index']);
    Route::get('admin/images/upload', [AdminImageController::class, 'create']);
    //admin's Image store & delete options
    Route::post('admin/images', [AdminImageController::class, 'store']);
    Route::delete('admin/images/{image}', [AdminImageController::class, 'destroy']);
});