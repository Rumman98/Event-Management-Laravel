<?php

use Illuminate\Support\Facades\Route;

// Dashboard Routes
Route::get('/','DashboardController@DashboardIndex');
Route::get('/visitor','VisitorController@VisitorIndex');

// Events Route
Route::get('/Events','EventsController@EventsIndex');
Route::get('/getEventsdata','EventsController@GetEventsData');
Route::post('/getEventdetails','EventsController@GetEventDetails');
Route::post('/EventApprovalUpdate','EventsController@EventApprovalUpdate');
Route::post('/Eventdelete','EventsController@EventDelete');






// Gallery Routes
Route::get('/Gallery','GalleryController@GalleryIndex');
Route::post("/galleryphotoUpload", 'GalleryController@GalleryPhotoUpload');

// Host DATA Routes
Route::get('/Hosts','HostsController@HostsIndex');
Route::get('/gethostdata','HostsController@GetHostsData');
Route::post('/hostdelete','HostsController@HostDelete');



// Messages Route
Route::get('/Messages','MessagesController@MessagesIndex');

// Reports Route
Route::get('/Reports','ReportController@ReportIndex');

// Users Data Route
Route::get('/Users','UsersController@UsersIndex');
Route::get('/getuserdata','UsersController@GetUserData');
Route::post('/userdelete','UsersController@UserDelete');

// Visitors Route
Route::get('/Visitors','VisitorsController@VisitorsIndex');

// Clients Review Route
Route::get('/Clients-Review','ClientReviewController@ClientReviewIndex');
