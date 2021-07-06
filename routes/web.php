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
		Route::get('/helpers', 'webController@helpers');
		Route::get('/helpers/{cat}', 'webController@helpersCat');
		Route::get('/helpers/detail/{id}/{name}', 'webController@helperDetail');
		Route::get('/agencies', 'webController@agencies');
		Route::get('/agencies/detail/{id}/{name}', 'webController@agencyDetail');
		Route::get('/employers', 'webController@employers');
		
		Route::get('/employer/detail/{id}/{name}', 'webController@employerDetail');

		Route::get('/searchResult', 'webController@searchResult');

		Route::post('/enquiry', 'webController@sendEnquiry');
		Route::post('/helpers', 'webController@helperSearch');
		Route::post('/agencies', 'webController@agencySearch');
		Route::post('/employers', 'webController@employersSearch');
		

		Route::get('/settings', 'webController@settings');
		Route::get('/private/status/{id}', 'webController@privateAccount');
		Route::get('/account/delete', 'webController@deleteAccount')->name('account.delete');
		Route::post('/password/change', 'webController@changePassword')->name('change.password');

		Route::get('/reviewInvitation/send/{id}', 'webController@sendInvitation');
		Route::get('reportReview/{id}', 'webController@reportReview');

	//Premium Account
		Route::prefix('premium')->group(function(){

			Route::get('/getPrice', 'premiumController@getPrice');
			Route::post('/subscribe', 'premiumController@subscribe')->name('premium.subscribe');
		});


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


	


	//Helper

	Route::prefix('coach')->namespace('coach')->group(function(){
		Route::get('profile', 'CoachController@index')->name('coach.dashboard');
		Route::get('lesson/favourite', 'CoachController@lesson_favourite')->name('coach.lesson.favourite');
		Route::get('equipment', 'CoachController@equipment')->name('coach.equipment');
		Route::get('my-wallet', 'CoachController@my_wallet')->name('coach.my_wallet');
		Route::get('my-account', 'CoachController@my_account')->name('coach.my_account');
		Route::get('order', 'CoachController@order')->name('coach.order');
	});





// Admin Routes

		
	// Authentication

		Route::get('/admin', 'adminController@index')->name('admin.dashboard');
		Route::get('/admin/login', 'adminController@login');
		Route::get('/admin/logout', 'adminController@logout');

		Route::post('/admin/login', 'adminController@loginAttempt');


	// Admin Users

		Route::get('/admin/users', 'adminController@users');
		Route::get('/admin/users/add', 'adminController@addUsers');
		Route::get('/admin/users/in-active/{id}', 'adminController@inActiveUsers');
		Route::get('/admin/users/edit/{id}', 'adminController@editUsers');
		Route::get('/admin/users/active/{id}', 'adminController@activeUsers');
		Route::get('/admin/users/delete/{id}', 'adminController@deleteUsers');

		Route::post('/admin/users/add', 'adminController@insertUsers');
		Route::post('/admin/users/update', 'adminController@updateUsers');


	// Site Users

		Route::get('/admin/site-user/terminate/{id}', 'siteUserController@terminateUser');
		Route::get('/admin/site-user/suspend/{id}', 'siteUserController@suspendUser');
		Route::get('/admin/site-user/active/{id}', 'siteUserController@activeUser');

		// Employers
			Route::get('/admin/site-user/employers', 'siteUserController@employers');

		// Helpers
			Route::get('/admin/site-user/helpers', 'siteUserController@helpers');

		// Agencies
			Route::get('/admin/site-user/agencies', 'siteUserController@agencies');


	// Chat Logs

		Route::get('/admin/chat-log', 'chatLogController@index');
		Route::get('/admin/chat-log/detail/{sender}/{receiver}', 'chatLogController@logDetails');
		Route::get('/admin/chat-log/filter', 'chatLogController@filterLog');

		Route::post('/admin/chat-log/filter', 'chatLogController@filterLogSubmit');


	// Enquiries

		Route::get('/admin/enquiries', 'enquiryController@index');
		Route::get('/admin/enquiries/pending', 'enquiryController@pendingEnquiries');
		Route::get('/admin/enquiries/detail/{id}', 'enquiryController@enquiryDetail');

		Route::post('/admin/equiries/reply', 'enquiryController@insertReply');


	// Review Reports

		Route::get('/admin/reviewReports', 'reviewReportController@index');
		Route::get('/admin/reviewHide/{id}', 'reviewReportController@hide');
		Route::get('/admin/reviewDelete/{id}', 'reviewReportController@delete');

	//website Setting 
	Route::get('/admin/websiteSetting', 'websiteSettingControlle@index');	