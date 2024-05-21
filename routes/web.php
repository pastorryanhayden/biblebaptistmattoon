<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\AboutPageController;
use App\Http\Controllers\MinistryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DevotionController;
use App\Http\Controllers\SermonController;

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

Route::get('/', [HomePageController::class, 'show']);
Route::get('/about', [AboutPageController::class, 'show']);
Route::get('/ministries', [MinistryController::class, 'index']);
Route::get('/ministry/{slug}', [MinistryController::class, 'show']);
Route::get('/events', [EventController::class, 'index']);
Route::get('/events/{slug}', [EventController::class, 'show']);
Route::get('/devotion', [DevotionController::class, 'index']);
Route::get('/devotion/{id}', [DevotionController::class, 'show']);
Route::get('/sermons', [SermonController::class, 'index']);
Route::get('/sermons/{slug}', [SermonController::class, 'show']);
