<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'HomeController@Index');
Route::get('/running-events', 'HomeController@RunningEventPage');
Route::get('/gallery', 'HomeController@AllGalaryPage');

Route::get('/registration', 'RegistrationController@RegistrationPage');
Route::post('/user-reg', 'RegistrationController@UserRegistration');

Route::get('/login', 'LoginController@loginPage');
Route::post('/loginClick', 'LoginController@OnLogin');
Route::get('/logout', 'LoginController@onLogout');

Route::get("/userprofile", 'ProfileController@UserProfile')->middleware('loginCheck');

Route::get("/hostprofile", 'ProfileController@HostProfile')->middleware('loginCheck');