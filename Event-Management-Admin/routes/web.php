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

Route::get('/','DashboardController@DashboardIndex');

Route::get('/Events','EventsController@EventsIndex');

Route::get('/Gallery','GalleryController@GalleryIndex');

Route::get('/Hosts','HostsController@HostsIndex');

Route::get('/Messages','MessagesController@MessagesIndex');

Route::get('/Reports','ReportController@ReportIndex');

Route::get('/Users','UsersController@UsersIndex');

Route::get('/Visitors','VisitorsController@VisitorsIndex');
