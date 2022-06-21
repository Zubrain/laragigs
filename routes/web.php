<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
use App\Models\Listing;
use App\Models\User;
use Illuminate\Routing\RouteAction;

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

//Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

//Single listing
Route::get('/listing/{id}', [ListingController::class, 'show']);

//Show create form
Route::get('listings/create', [ListingController::class, 'create'])->middleware('auth'); 

//Store New Listing Data
Route::post('listings', [ListingController::class, 'store'])->middleware('auth');

//Show edit form
Route::get('listing/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

//Update Listing
Route::put('listing/{listing}', [ListingController::class, 'update'])->middleware('auth');

//Delete Listing
Route::delete('listing/{listing}', [ListingController::class, 'delete'])->middleware('auth');

//User Register Form
Route::get('/register', [UserController::class, 'register'])->middleware('guest');

//Store Register Form Data
Route::post('/users', [UserController::class, 'store'])->middleware('guest');

//Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//Login User
Route::post('/users/authenticate', [UserController::class, 'authenticate'])->middleware('guest');

