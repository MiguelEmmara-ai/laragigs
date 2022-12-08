<?php

use App\Http\Controllers\ListingsController;
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

Route::resource('listings', ListingsController::class);
