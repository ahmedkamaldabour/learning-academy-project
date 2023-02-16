<?php

use App\Http\Controllers\admin\AdminConroller;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\admin\TrainerController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\front\ContactController;
use App\Http\Controllers\front\CourseController;
use App\Http\Controllers\front\HomePageController;
use App\Http\Controllers\front\MessageController;
use App\Http\Controllers\front\WishlistController;
use App\Models\Message;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user', 'as' => 'front.'], function () {
	Route::get('/', [HomePageController::class, 'index'])->name('homepage');
	Route::get('/category/{id}', [CourseController::class, 'category'])->name('category');
	Route::get('/course/{id}', [CourseController::class, 'singleCourse'])
		->name('singleCourse');
	Route::get('/contact', [ContactController::class, 'index'])->name('contact');
	Route::post('/contact/newsletter', [MessageController::class, 'newsletter'])
		->name('message.newsletter');
	Route::post('/contact/message', [MessageController::class, 'contact'])
		->name('message.contact');

	Route::group(['middleware' => ['guest']], (function () {
		Route::get('/login', [HomePageController::class, 'login'])->name('login');
		Route::get('/register', [HomePageController::class, 'register'])->name('register');
		Route::post('/login', [AuthController::class, 'user_login'])->name('auth.login');
		Route::post('/register', [AuthController::class, 'user_register'])->name('auth.register');

	}));

	Route::group(['middleware' => ['auth']], (function () {
		Route::post('/contact/enroll', [MessageController::class, 'enroll'])->name('message.enroll');
		Route::get('/logout', [AuthController::class, 'user_logout'])->name('auth.logout');
		Route::get('course/{id}/fav/add', [CourseController::class, 'addToFavourite'])->name('course.add.favorite');
		Route::get('course/{id}/fav/remove', [CourseController::class, 'removeFromFavourite'])->name('course.remove.favorite');
		Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
		//		Route::get('/profile', [HomePageController::class, 'profile'])->name('profile');
		Route::get('/courses/enrolment', [CourseController::class, 'studentCourses'])->name('courses.studentCourses');
	}));

});

//---------------------Admin Routes---------------------
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

	Route::group(['middleware' => ['guest']], (function () {
		Route::post('/login', [AuthController::class, 'auth'])->name('auth');
		Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
	}));
	Route::group(['middleware' => ['auth.admin']], (function () {
		Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
		Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
		Route::resource('admins', AdminConroller::class)->except(methods:'show');
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
