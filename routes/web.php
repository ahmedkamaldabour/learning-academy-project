<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\admin\TrainerController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\front\ContactController;
use App\Http\Controllers\front\CourseController;
use App\Http\Controllers\front\HomePageController;
use App\Http\Controllers\front\MessageController;
use App\Models\Message;
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
// contact controller routes in front folder
Route::get('/contact', [ContactController::class, 'index'])->name('front.contact');
Route::post('/contact/newsletter', [MessageController::class, 'newsletter'])
	->name('front.message.newsletter');
Route::post('/contact/message', [MessageController::class, 'contact'])
	->name('front.message.contact');
// enroll controller routes in front folder
Route::post('/contact/enroll', [MessageController::class, 'enroll'])->name('front.message.enroll');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

	Route::group(['middleware' => ['guest']], (function () {
		Route::post('/login', [AuthController::class, 'auth'])->name('auth');
		Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
	}));
	Route::group(['middleware' => ['auth.admin']], (function () {
		Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
		Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
		// resource controller routes in admin folder
		Route::resource('/category', CategoryController::class)->except(methods:'show');
		Route::resource('/trainers', TrainerController::class)->except(methods:'show');
		Route::resource('/courses', \App\Http\Controllers\admin\CourseController::class)->except(methods:'show');
		Route::resource('/students', StudentController::class);
		Route::post('/students/{student}/approve/{course}', [StudentController::class, 'approve'])->name('students.approve');
		Route::post('/students/{student}/reject/{course}', [StudentController::class, 'reject'])->name('students.reject');
		Route::Post('/students/{student}/enroll', [StudentController::class, 'enroll'])->name('students.enroll');
		Route::get('/students/{student}/enroll', [StudentController::class, 'enrollForm'])->name('students.enrollForm');
	}));

});



