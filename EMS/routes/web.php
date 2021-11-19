<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'HomeController@Index');

Route::get('/running-events', 'HomeController@RunningEventPage')->middleware('loginCheck');
Route::get('/gallery', 'HomeController@AllGalaryPage');
Route::get('/registration', 'HomeController@RegistrationPage');

Route::get('/login', 'LoginController@loginPage');
Route::post('/loginClick', 'LoginController@OnLogin');

