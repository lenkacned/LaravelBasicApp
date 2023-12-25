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

Route::get('register' , [RegisterController::class, 'create']);
Route::post('register' , [RegisterController::class, 'store']);
Route::get('login', [SessionsController::class, 'create']);
Route::post('sessions', [SessionsController::class, 'store']);
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');
Route::get('images/{image:slug}', [ImageController::class, 'show']);    

// If only admin can register a user show only guest view for all non-logged in users
// and do not show registration form. Show only login form and guest view.
// Create view only for guests. Guests should not log in.
// Implement 'can' middleware for authorization actions.
// Route::middleware('guest')->group(function () {
// });

Route::middleware('can:admin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::prefix('images')->group(function () {
            //special admin's settings page
            Route::get('/', [AdminImageController::class, 'index']);
            Route::get('/upload', [AdminImageController::class, 'create']);
            //admin's Image store & delete options
            Route::post('/', [AdminImageController::class, 'store']);
            Route::delete('/{image}', [AdminImageController::class, 'destroy']);
       });
   });
});
