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
	Route::namespace('web')->group(function(){

		// Main Pages
			Route::get('/', 'webController@index');
			Route::get('/search', 'webController@search')->name('web.search');
			Route::get('/filter/{val}/{type}', 'webController@filter')->name('web.filter');
            ROute::get('/filter/{type}','webController@search_filter')->name('web.search.filter');

			Route::get('cart/{type}/{id}/{package}', 'cartController@cart');

			Route::middleware('userAuth')->group(function(){

				Route::post('checkout', 'cartController@checkout')->name('web.checkout');
			});

		// User Authentication
			Route::post('/register', 'authController@register');
			Route::post('/login', 'authController@login');
			Route::get('/logout', 'authController@logout')->name('logout');



			//Login With Google

				Route::get('auth/google', 'googleController@redirectToGoogle');
				Route::get('auth/google/callback', 'googleController@handleGoogleCallback');

			//Login With Facebook

				Route::get('auth/facebook', 'facebookController@redirectToFacebook');
				Route::get('auth/facebook/callback', 'facebookController@handleFacebookCallback');


		//Activities
			Route::prefix('activity')->group(function(){

				Route::get('details/{id}', 'webController@activityDetails')->name('activity.details');
			});


		//Lessons
			Route::prefix('lesson')->group(function(){

				Route::get('details/{id}', 'webController@lessonDetails')->name('lesson.details');
			});
        // Profile Details
            Route::get('Coach/details/{id}','webController@coachDetails')->name('web.user.details');

	});


//User Dashboard

	Route::middleware('userAuth')->group(function(){

		//Coach
			Route::prefix('coach')->namespace('coach')->group(function(){

				Route::get('/', 'CoachController@index')->name('coach.dashboard');

				//My Account
					Route::prefix('my-account')->group(function(){

						Route::get('/', 'settingController@index')->name('coach.my_account');
						Route::post('/upload_profile_pic', 'settingController@uploadProfilePicture')->name('coach.my_account.profileImage');

						Route::post('/update_profile', 'settingController@update_profile')->name('coach.my_account.update_profile');

						Route::post('/add_lang', 'settingController@add_lang')->name('coach.my_account.add_lang');

						Route::post('/add_edu', 'settingController@add_edu')->name('coach.my_account.add_edu');

						Route::post('/add_certificate', 'settingController@add_certificate')->name('coach.my_account.add_certificate');


						Route::post('id_proof', 'settingController@idProof')->name('coach.my_account.idProof');
						Route::post('add_proof', 'settingController@addProof')->name('coach.my_account.addProof');

                        Route::post('add_media', 'settingController@addMedia')->name('coach.my_account.addMedia');
					});

				//Category
					Route::prefix('category')->group(function(){

						Route::get('/', 'categoryController@index')->name('coach.category');
						Route::get('/add', 'categoryController@add')->name('coach.category.add');
						Route::post('/add', 'categoryController@insert');

						Route::get('/edit/{id}', 'categoryController@edit')->name('coach.category.edit');
						Route::post('/update', 'categoryController@update')->name('coach.category.update');

						Route::get('/delete/{id}', 'categoryController@delete')->name('coach.category.delete');
					});

				//Equipment
					Route::prefix('equipment')->group(function(){

						Route::get('/', 'equipmentController@index')->name('coach.equipment');
						Route::get('/add', 'equipmentController@add')->name('coach.equipment.add');
						Route::post('/add', 'equipmentController@insert');

						Route::get('/edit/{id}', 'equipmentController@edit')->name('coach.equipment.edit');
						Route::post('/update', 'equipmentController@update')->name('coach.equipment.update');

						Route::get('/delete/{id}', 'equipmentController@delete')->name('coach.equipment.delete');
					});

				//Lessons
					Route::prefix('lessons')->group(function(){

						Route::get('/', 'lessonsController@index')->name('coach.lesson');
						Route::get('/add', 'lessonsController@add')->name('coach.lesson.add');
						Route::post('/add', 'lessonsController@insert');

						Route::get('/edit/{id}', 'lessonsController@edit')->name('coach.lesson.edit');
						Route::post('/update', 'lessonsController@update')->name('coach.lesson.update');

						Route::get('/delete/{id}', 'lessonsController@delete')->name('coach.lesson.delete');
					});

				//Availability
					Route::prefix('availability')->group(function(){

						Route::get('/', 'availabilityController@index')->name('coach.availability');
						Route::get('/add', 'availabilityController@add')->name('coach.availability.add');
						Route::post('/add/slot', 'availabilityController@insertSlot')->name('coach.availability.addSlot');
						Route::post('/add/holiday', 'availabilityController@insertHoliday')->name('coach.availability.addHoliday');

						Route::get('/delete/{id}', 'availabilityController@delete')->name('coach.availability.delete');
						Route::get('/delete/holiday/{id}', 'availabilityController@deleteHoliday')->name('coach.availability.delete.holiday');
					});

				//Orders
					Route::prefix('orders')->group(function(){

						Route::get('/', 'orderController@index')->name('coach.orders');
					});

                    Route::get('/my_account_area/','CoachController@my_account_area')->name('coach.my.account_area');
                    Route::get('/wallet','CoachController@my_wallet')->name('coach.my_wallet');
			});



		//Sports Buddy
			Route::prefix('buddy')->namespace('buddy')->group(function(){

				Route::get('/', 'buddyController@index')->name('buddy.dashboard');

				//My Account
					Route::prefix('my-account')->group(function(){

						Route::get('/', 'settingController@index')->name('buddy.my_account');
						Route::post('/upload_profile_pic', 'settingController@uploadProfilePicture')->name('buddy.my_account.profileImage');

						Route::post('/update_profile', 'settingController@update_profile')->name('buddy.my_account.update_profile');

						Route::post('/add_lang', 'settingController@add_lang')->name('buddy.my_account.add_lang');

						Route::post('/add_edu', 'settingController@add_edu')->name('buddy.my_account.add_edu');

						Route::post('/add_certificate', 'settingController@add_certificate')->name('buddy.my_account.add_certificate');



						Route::post('id_proof', 'settingController@idProof')->name('buddy.my_account.idProof');
						Route::post('add_proof', 'settingController@addProof')->name('buddy.my_account.addProof');
					});

				//Category
					Route::prefix('category')->group(function(){

						Route::get('/', 'categoryController@index')->name('buddy.category');
						Route::get('/add', 'categoryController@add')->name('buddy.category.add');
						Route::post('/add', 'categoryController@insert');

						Route::get('/edit/{id}', 'categoryController@edit')->name('buddy.category.edit');
						Route::post('/update', 'categoryController@update')->name('buddy.category.update');

						Route::get('/delete/{id}', 'categoryController@delete')->name('buddy.category.delete');
					});

				//Equipment
					Route::prefix('equipment')->group(function(){

						Route::get('/', 'equipmentController@index')->name('buddy.equipment');
						Route::get('/add', 'equipmentController@add')->name('buddy.equipment.add');
						Route::post('/add', 'equipmentController@insert');

						Route::get('/edit/{id}', 'equipmentController@edit')->name('buddy.equipment.edit');
						Route::post('/update', 'equipmentController@update')->name('buddy.equipment.update');

						Route::get('/delete/{id}', 'equipmentController@delete')->name('buddy.equipment.delete');
					});

				//Activity
					Route::prefix('activity')->group(function(){

						Route::get('/', 'activityController@index')->name('buddy.activity');
						Route::get('/add', 'activityController@add')->name('buddy.activity.add');
						Route::post('/add', 'activityController@insert');

						Route::get('/edit/{id}', 'activityController@edit')->name('buddy.activity.edit');
						Route::post('/update', 'activityController@update')->name('buddy.activity.update');

						Route::get('/delete/{id}', 'activityController@delete')->name('buddy.activity.delete');
					});

				Route::get('lesson/favourite', 'CoachController@lesson_favourite')->name('coach.lesson.favourite');
				Route::get('my-wallet', 'buddyController@my_wallet')->name('buddy.my_wallet');
				Route::get('order', 'buddyController@my_orders')->name('buddy.order');
                Route::get('friends', 'buddyController@my_friends')->name('buddy.friends');
                Route::get('analytics-and-redeem', 'buddyController@analytics_and_redeem')->name('buddy.analytics_and_redeem');
                Route::get('my_account_area', 'buddyController@my_account_area')->name('buddy.my_account_area');
			});
	});





// Admin Routes


	// Authentication

		Route::prefix('admin')->namespace('admin')->group(function(){
			Route::get('login', 'adminController@login')->name('admin.login');
			Route::get('logout', 'adminController@logout');
			Route::post('login', 'adminController@loginAttempt');

			//Middleware
				Route::middleware('adminAuth')->group(function(){

					Route::get('/', 'adminController@index')->name('admin.dashboard');


					//All Users
						Route::prefix('users')->group(function(){

							Route::get('active', 'userController@active')->name('admin.users.active');
							Route::get('blocked', 'userController@blocked')->name('admin.users.blocked');

							Route::get('block/{id}', 'userController@block');
							Route::get('activate/{id}', 'userController@activate');


							Route::get('idProof', 'userController@idProof')->name('admin.users.id_proof');
							Route::get('addProof', 'userController@addProof')->name('admin.users.add_proof');
							Route::get('idProof/approve/{id}', 'userController@idProofApprove');
							Route::get('idProof/reject/{id}', 'userController@idProofReject');
							Route::get('addProof/approve/{id}', 'userController@addProofApprove');
							Route::get('addProof/reject/{id}', 'userController@addProofReject');
						});


					//All Lessons
						Route::prefix('lessons')->group(function(){

							Route::get('active', 'lessonsController@active')->name('admin.lessons.active');
							Route::get('blocked', 'lessonsController@blocked')->name('admin.lessons.blocked');

							Route::get('block/{id}', 'lessonsController@block');
							Route::get('activate/{id}', 'lessonsController@activate');
						});


					//All Activities
						Route::prefix('activities')->group(function(){

							Route::get('active', 'activityController@active')->name('admin.activities.active');
							Route::get('blocked', 'activityController@blocked')->name('admin.activities.blocked');

							Route::get('block/{id}', 'activityController@block');
							Route::get('activate/{id}', 'activityController@activate');
						});

					//settings
						Route::prefix('settings')->group(function(){


							//Sports Category
							Route::prefix('category')->group(function(){

								Route::get('/', 'settingController@category')->name('admin.setting.category');
								Route::get('add', 'settingController@categoryAdd')->name('admin.setting.category.add');

								Route::get('edit/{id}', 'settingController@categoryEdit')->name('admin.setting.category.edit');

								Route::get('delete/{id}', 'settingController@categoryDelete');


								Route::post('add', 'settingController@categoryInsert');
								Route::post('update', 'settingController@categoryUpdate')->name('admin.setting.category.update');


								Route::get('/requests', 'settingController@categoryRequest')->name('admin.setting.category.requests');
								Route::get('request/delete/{id}', 'settingController@categoryRequestDelete');
							});
						});
				});
		});
