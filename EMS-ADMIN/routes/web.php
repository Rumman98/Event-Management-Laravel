<?php

use Illuminate\Support\Facades\Route;


Route::get('/','DashboardController@DashboardIndex');

Route::get('/Events','EventsController@EventsIndex');

Route::get('/Gallery','GalleryController@GalleryIndex');

Route::get('/Hosts','HostsController@HostsIndex');

Route::get('/Messages','MessagesController@MessagesIndex');

Route::get('/Reports','ReportController@ReportIndex');

Route::get('/Users','UsersController@UsersIndex');

Route::get('/Visitors','VisitorsController@VisitorsIndex');

Route::get('/Clients-Review','ClientReviewController@ClientReviewIndex');
