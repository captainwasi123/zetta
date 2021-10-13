<?php

use App\Http\Controllers\FavouriteController;
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
			Route::get('/about_us', 'webController@aboutUs');
			Route::get('/all/{type}', 'webController@all')->name('web.all');
			Route::get('/search', 'webController@search')->name('web.search');
			Route::get('/filter/{val}/{type}/{add}', 'webController@filter')->name('web.filter');
            ROute::get('/filter/{type}','webController@search_filter')->name('web.search.filter');

			Route::get('cart/{type}/{id}/{package}', 'cartController@cart');
			Route::post('/payment/stripe', 'cartController@stripePayment')->name('stripe.submit');
			Route::get('/order/confirmed/{id}/{type}', 'cartController@orderComfirmed');


			Route::post('/stickman', 'webController@stickmanSearch');
			Route::get('/stickman/subCategory/{id}', 'webController@stickmanSubCategory');

			Route::middleware('userAuth')->group(function(){

				Route::post('checkout', 'cartController@checkout')->name('web.checkout');
			});

			//Footer Pages

			Route::get('terms', 'webController@terms')->name('web.terms');
			Route::get('faq', 'webController@faq')->name('web.faq');
			Route::get('refund_cancel_policy', 'webController@refund_cancel_policy')->name('web.refund_cancel_policy');
			Route::get('cookie_policy', 'webController@cookie_policy')->name('web.cookie_policy');
			Route::get('cookiePolicy', 'webController@cookiePolicy')->name('web.cookiePolicy');
			Route::get('disclaimerPolicy', 'webController@disclaimerPolicy')->name('web.disclaimerPolicy');



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


			Route::get('getUserMessage/{id}', 'webController@getUserMessage');
			Route::post('sendMessage', 'webController@sendMessage');

		//Activities
			Route::prefix('activity')->group(function(){

				Route::get('details/{id}', 'webController@activityDetails')->name('activity.details');
			});


		//Lessons
			Route::prefix('lesson')->group(function(){

				Route::get('details/{id}', 'webController@lessonDetails')->name('lesson.details');
			});

        //Coach Profile Details
            Route::get('Coach/details/{id}','webController@coachDetails')->name('web.coach.details');

	    //ACtivity Profile Details
	       	Route::get('buddy/details/{id}','webController@buddyDetails')->name('web.buddy.details');

            Route::prefix('favourite')->group(function(){


                /// add favourite activity
                Route::get('/activity/add/{id}','FavouriteController@fav_activity')->name('favourite.activity.add');
                Route::get('/activity/delete//{id}','FavouriteController@delfavactivity')->name('favourite.activity.del');

				

                // add favourite Lesson
                Route::get('/lesson/add/{id}','FavouriteController@fav_lesson')->name('favourite.lesson.add');
                Route::get('/lesson/delete/{id}','FavouriteController@delfavlesson')->name('favourite.lesson.del');
                

                // add favourite Coach
                Route::get('/coach/add/{id}','FavouriteController@fav_coach')->name('favourite.coach.add');
                Route::get('/coach/delete/{id}','FavouriteController@delfavcoach')->name('favourite.coach.del');


                // add favourite Buddy
                Route::get('/buddy/add/{id}','FavouriteController@fav_buddy')->name('favourite.buddy.add');
                Route::get('/buddy/delete/{id}','FavouriteController@delfavbuddy')->name('favourite.buddy.del');

                

            });

	});


//User Dashboard

	Route::middleware('userAuth')->group(function(){


		//Coach
			Route::prefix('coach')->namespace('coach')->group(function(){

				Route::get('/', 'CoachController@index')->name('coach.dashboard');
                Route::get('/friends','CoachController@friend')->name('coach.friends');
                Route::get('/friends/search','CoachController@search_friends')->name('coach.friends.search');
				Route::get('/favouriteCoach', 'CoachController@favouriteCoach')->name('coach.favouriteCoach');
				Route::get('/favouriteLesson', 'lessonsController@favouriteLesson')->name('coach.favouriteLesson');





				//Messenger
					Route::prefix('inbox')->group(function(){
						Route::get('/', 'chatController@index')->name('coach.messages');
						Route::get('chat/{id}/{name}', 'chatController@inboxChat');

						Route::post('messageSend', 'chatController@sendMessage');
					});

				//My Account
					Route::prefix('my-account')->group(function(){

						Route::get('/', 'settingController@index')->name('coach.my_account');
						Route::post('/upload_profile_pic', 'settingController@uploadProfilePicture')->name('coach.my_account.profileImage');

						Route::post('/update_profile', 'settingController@update_profile')->name('coach.my_account.update_profile');

						Route::post('/add_lang', 'settingController@add_lang')->name('coach.my_account.add_lang');

                        Route::get('/remove_lang/{id}', 'settingController@remover_lang')->name('coach.my_account.remover_lang');

						Route::post('/add_edu', 'settingController@add_edu')->name('coach.my_account.add_edu');

                        Route::get('/remove_edu/{id}', 'settingController@remove_edu')->name('coach.my_account.remover_edu');

						Route::post('/add_certificate', 'settingController@add_certificate')->name('coach.my_account.add_certificate');

                        Route::get('/remove_certificate/{id}', 'settingController@remove_certificate')->name('coach.my_account.remove_certificate');

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


						Route::get('/sports/{id}', 'lessonsController@getSports');
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
                        Route::get('/{id}', 'orderController@orderView')->name('coach.orders.view');
                        Route::post('/group/msg','orderController@group_order_msg')->name('coach.group.msg');
					});

				//My Account Area
					Route::prefix('my_account_area')->group(function(){

						Route::get('/', 'myaccountController@index')->name('coach.my_account_area');
					});

                    Route::get('/wallet','CoachController@my_wallet')->name('coach.my_wallet');
			});





		//Sports Buddy
			Route::prefix('buddy')->namespace('buddy')->group(function(){

				Route::get('/', 'buddyController@index')->name('buddy.dashboard');
				Route::get('/become_a_coach', 'buddyController@become_a_coach')->name('buddy.become_a_coach');
				Route::get('/favouriteActivity', 'activityController@favouriteActivity')->name('buddy.favouriteActivity');
				Route::get('/favouriteBuddy', 'buddyController@favouriteBuddy')->name('buddy.favouriteBuddy');


				

				//Messenger
					Route::prefix('inbox')->group(function(){
						Route::get('/', 'chatController@index')->name('buddy.messages');
						Route::get('chat/{id}/{name}', 'chatController@inboxChat');

						Route::post('messageSend', 'chatController@sendMessage');
					});



				//My Account
					Route::prefix('my-account')->group(function(){

						Route::get('/', 'settingController@index')->name('buddy.my_account');
						Route::post('/upload_profile_pic', 'settingController@uploadProfilePicture')->name('buddy.my_account.profileImage');

						Route::post('/update_profile', 'settingController@update_profile')->name('buddy.my_account.update_profile');

						Route::post('/add_lang', 'settingController@add_lang')->name('buddy.my_account.add_lang');

                        Route::get('/remove_lang/{id}', 'settingController@remover_lang')->name('buddy.my_account.remover_lang');

						Route::post('/add_edu', 'settingController@add_edu')->name('buddy.my_account.add_edu');

                        Route::get('/remove_edu/{id}', 'settingController@remove_edu')->name('coach.my_account.remover_edu');

						Route::post('/add_certificate', 'settingController@add_certificate')->name('buddy.my_account.add_certificate');

                        Route::get('/remove_certificate/{id}', 'settingController@remove_certificate')->name('coach.my_account.remove_certificate');

						Route::post('id_proof', 'settingController@idProof')->name('buddy.my_account.idProof');
						Route::post('add_proof', 'settingController@addProof')->name('buddy.my_account.addProof');

                        Route::post('/coach_request','buddyController@coach_requet')->name('buddy.coach.request');
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

						Route::get('/sports/{id}', 'activityController@getSports');
					});

				//Friends
					Route::prefix('friends')->group(function(){
                		Route::get('/', 'friendController@my_friends')->name('buddy.friends');
                		Route::get('search/{val}', 'friendController@search');
                		Route::get('add/{id}', 'friendController@addFriend');
                		Route::get('remove/{id}', 'friendController@removeFriend');
					});

					//Friends
					Route::prefix('friends')->group(function(){
                		Route::get('/', 'friendController@my_friends')->name('buddy.friends');

					});

				//Orders
					Route::prefix('orders')->group(function(){

						Route::get('/', 'orderController@index')->name('buddy.order');
                        Route::get('/{id}', 'orderController@orderView')->name('buddy.orders.view');
                        Route::post('/group/msg','orderController@group_order_msg')->name('buddy.group.msg');

                        Route::get('checkReview/{id}', 'orderController@checkReview');
                        Route::post('submitReview', 'orderController@submitReview')->name('buddy.review.submit');
					});

				//Analytics and Redeem
					Route::prefix('analytics-and-redeem')->group(function(){
        		        Route::get('/', 'redeemController@index')->name('buddy.analytics_and_redeem');
					});

				Route::get('lesson/favourite', 'CoachController@lesson_favourite')->name('coach.lesson.favourite');
				Route::get('my-wallet', 'buddyController@my_wallet')->name('buddy.my_wallet');
                Route::get('my_account_area', 'buddyController@my_account_area')->name('buddy.my_account_area');
                Route::post('/coach-request','buddyController@coach_requet')->name('buddy.coach.request');
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
                            Route::get('all-coach-requets/', 'userController@coach_requets')->name('admin.user.coach_request');

                            Route::get('all-coach-requets/answers/{id}', 'userController@coach_requets_answers');
                            Route::get('coach/request/approve/{id}', 'userController@coach_requet_approve')->name('admin.user.coach.approve');
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


					//Analytics & Redeem
						Route::prefix('redeem')->group(function(){

							Route::prefix('challenges')->group(function(){
								Route::get('/', 'redeemController@challenges')->name('admin.redeem.challenges');
								Route::get('add', 'redeemController@challengesAdd')->name('admin.redeem.challenges.add');
								Route::post('add', 'redeemController@challengesInsert');
							});

							Route::get('badges', 'redeemController@badges')->name('admin.redeem.badges');
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

							//Sports
							Route::prefix('sports')->group(function(){

								Route::get('/', 'settingController@sports')->name('admin.setting.sports');
								Route::get('add', 'settingController@sportsAdd')->name('admin.setting.sports.add');

								Route::get('edit/{id}', 'settingController@sportsEdit')->name('admin.setting.sports.edit');

								Route::get('delete/{id}', 'settingController@sportsDelete');


								Route::post('add', 'settingController@sportsInsert');
								Route::post('update', 'settingController@sportsUpdate')->name('admin.setting.sports.update');
							});

                            Route::prefix('language')->group(function(){
                                Route::get('/','LanguageController@index')->name('admin.setting.language');
                                Route::get('add','LanguageController@language_add')->name('admin.setting.language.add');
                                Route::post('save','LanguageController@language_save')->name('admin.setting.language.save');
                                Route::get('edit/{id}','LanguageController@language_edit')->name('admin.setting.language.edit');
                                Route::get('delete/{id}','LanguageController@language_delete')->name('admin.setting.language.delete');
                            });
						});
				});
		});
