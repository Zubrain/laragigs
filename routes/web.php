<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//All Listings
Route::get('/', [ListingController::class, 'index']);

//Single listing
Route::get('/listing/{id}', [ListingController::class, 'show']);

//Show create form
Route::get('listings/create', [ListingController::class, 'create']);

//Store New Listing Data
Route::post('listings', [ListingController::class, 'store']);

//Show edit form
Route::get('listing/{listing}/edit', [ListingController::class, 'edit']);

//Update Listing
Route::put('listing/{listing}', [ListingController::class, 'update']);

//Delete Listing
Route::delete('listing/{listing}', [ListingController::class, 'delete']);

//User Register Form
Route::get('/register', [UserController::class, 'register']);

//Store Register Form Data
Route::post('/users', [UserController::class, 'store']);