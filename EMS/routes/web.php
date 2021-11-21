<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'HomeController@Index');
Route::get('/running-events', 'HomeController@RunningEventPage');
Route::get('/gallery', 'HomeController@AllGalaryPage');

Route::get('/registration', 'RegistrationController@RegistrationPage');
Route::post('/user-reg', 'RegistrationController@UserRegistration');

Route::get('/login', 'LoginController@loginPage');
Route::post('/loginClick', 'LoginController@OnLogin');

<<<<<<< Updated upstream
Route::get("/profile/{mobile_number}", 'ProfileController@UserHostProfile')->middleware('loginCheck');
=======
<<<<<<< HEAD
<<<<<<< HEAD
Route::get("/userprofile", 'HomeController@UserHostProfile')->middleware('loginCheck');

Route::get("/hostprofile", function(){ return View("HostProfile"); });
=======
Route::get("/profile/{mobile_number}", 'ProfileController@UserHostProfile')->middleware('loginCheck');
>>>>>>> 410892fba3c768d5097f05c6002e7806d28dd8ef
=======
Route::get("/profile/{mobile_number}", 'ProfileController@UserHostProfile')->middleware('loginCheck');
>>>>>>> 410892fba3c768d5097f05c6002e7806d28dd8ef
>>>>>>> Stashed changes
