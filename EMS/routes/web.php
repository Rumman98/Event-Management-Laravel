<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'HomeController@Index');
Route::get('/running-events', 'HomeController@RunningEventPage');
Route::get('/gallery', 'HomeController@AllGalaryPage');
Route::get('/contact-us', 'HomeController@ContactPage');

Route::get('/registration', 'RegistrationController@RegistrationPage');
Route::post('/user-reg', 'RegistrationController@UserRegistration');

Route::get('/login', 'LoginController@loginPage');
Route::post('/loginClick', 'LoginController@OnLogin');
Route::get('/logout', 'LoginController@onLogout');

Route::get("/userprofile", 'ProfileController@UserProfile')->middleware('loginCheck');
Route::get("/hostprofile", 'ProfileController@HostProfile')->middleware('loginCheck');
Route::post("/changePassword", 'ProfileController@ChangePasswordUser')->middleware('loginCheck');
Route::post("/changePasswordHost", 'ProfileController@ChangePasswordHost')->middleware('loginCheck');


Route::post("/user-details", 'ProfileController@UserDetails')->middleware('loginCheck');
Route::post("/user-update", 'ProfileController@UpdateUserDetails')->middleware('loginCheck');

Route::post("/host-details", 'ProfileController@HostDetails')->middleware('loginCheck');
Route::post("/host-update", 'ProfileController@UpdateHostDetails')->middleware('loginCheck');

Route::post("/add-event", 'EventController@AddEvent')->middleware('loginCheck');
Route::post("/event-details", 'EventController@EventDetails')->middleware('loginCheck');
Route::post("/event-update", 'EventController@EventUpdate')->middleware('loginCheck');
