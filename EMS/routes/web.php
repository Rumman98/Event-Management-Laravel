<?php

use Illuminate\Support\Facades\Route;

/*
Hello
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
    return view('Home');
});

Route::get('/running-events', function () {
    return view('RunningEventsPage');
});

Route::get('/gallery', function () {
    return view('AllGallery');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/registration', function () {
    return view('registration');
});

