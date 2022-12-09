<?php

use App\Http\Controllers\ListingsController;
use App\Http\Controllers\UserController;
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

// Common Resource Routes:
// index - Show all listings
// show - Show single listings
// create - Show form to create new listing
// store - Store new listings
// edit - Show form to edit listing
// update - Updatelistings
// destroy - Delete listings

Route::get('/', [ListingsController::class, 'index'])->name('home');

Route::post('/login', [UserController::class, 'authenticate'])->name('authenticate-user');

Route::post('/register/store', [UserController::class, 'store'])->name('store');

Route::middleware('guest')->group(function () {
     Route::get('/register', [UserController::class, 'register'])->name('register');
     Route::get('/login', [UserController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
     Route::get('/listings/manage', [ListingsController::class, 'manage'])->name('manage-listings');
     Route::resource('listings', ListingsController::class);

     Route::post('/logout', [UserController::class, 'logout'])->name('logout-user');
});

Route::get('/listings/{listing}', [ListingsController::class, 'show']);
