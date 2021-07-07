<?php

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


// Web Routes

	// Main Pages
		Route::get('/', 'webController@index');
		


	// User Authentication
		Route::post('/register', 'authController@register');
		Route::post('/login', 'authController@login');
		Route::get('/logout', 'authController@logout');

		

		//Login With Google

			Route::get('auth/google', 'googleController@redirectToGoogle');
			Route::get('auth/google/callback', 'googleController@handleGoogleCallback');

		//Login With Facebook

			Route::get('auth/facebook', 'facebookController@redirectToFacebook');
			Route::get('auth/facebook/callback', 'facebookController@handleFacebookCallback');



//Coach

	Route::prefix('coach')->namespace('coach')->group(function(){
		Route::get('/', 'CoachController@index')->name('coach.dashboard');
		Route::get('lesson/favourite', 'CoachController@lesson_favourite')->name('coach.lesson.favourite');
		Route::get('equipment', 'CoachController@equipment')->name('coach.equipment');
		Route::get('my-wallet', 'CoachController@my_wallet')->name('coach.my_wallet');
		Route::get('my-account', 'CoachController@my_account')->name('coach.my_account');
		Route::get('order', 'CoachController@order')->name('coach.order');
	});





// Admin Routes

		
	// Authentication

		Route::prefix('admin')->group(function(){
			Route::get('/', 'adminController@index')->name('admin.dashboard');
			Route::get('login', 'adminController@login');
			Route::get('logout', 'adminController@logout');

			Route::post('login', 'adminController@loginAttempt');
		});
