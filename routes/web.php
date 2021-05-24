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

Route::get('/', function () {
    return view('welcome');
});








//Administration

	Route::prefix('admin')->namespace('admin')->group(function(){
		
		//Authentication
		Route::get('/login', 'authController@login');
		Route::post('/login', 'authController@loginAttempt');
		Route::get('/logout', 'authController@logout')->name('admin.logout');

		//Middleware
		Route::middleware('adminAuth')->group(function(){
			
			Route::get('/', 'adminController@index')->name('admin.dashboard');
		});

	});

