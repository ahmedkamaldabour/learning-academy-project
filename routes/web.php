<?php

use App\Http\Controllers\front\CourseController;
use App\Http\Controllers\front\HomePageController;
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

Route::get('/', [HomePageController::class, 'index'])->name('front.homepage');

// course controller routes in front folder
Route::get('/category/{id}', [CourseController::class, 'category'])->name('front.category');
Route::get('/course/{id}', [CourseController::class, 'singleCourse'])
	->name('front.singleCourse');