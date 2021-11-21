<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'HomeController@Index');
Route::get('/running-events', 'HomeController@RunningEventPage');
Route::get('/gallery', 'HomeController@AllGalaryPage');

Route::get('/registration', 'RegistrationController@RegistrationPage');
Route::post('/user-reg', 'RegistrationController@UserRegistration');

Route::get('/login', 'LoginController@loginPage');
Route::post('/loginClick', 'LoginController@OnLogin');

Route::get("/profile/{mobile_number}", 'ProfileController@UserHostProfile')->middleware('loginCheck');

Route::get("/userprofile", 'HomeController@UserHostProfile')->middleware('loginCheck');

Route::get("/hostprofile", function(){ return View("HostProfile"); });

Route::get("/profile/{mobile_number}", 'ProfileController@UserHostProfile')->middleware('loginCheck');

Route::get("/profile/{mobile_number}", 'ProfileController@UserHostProfile')->middleware('loginCheck');

