<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'HomeController@Index');
Route::get('/running-events', 'HomeController@RunningEventPage');
Route::get('/gallery', 'HomeController@AllGalaryPage');
Route::get('/contact-us', 'HomeController@ContactPage');

Route::get('/register-event', 'EventController@RegisterEventPage');
Route::get('/event-summary', 'EventController@EventSummary');

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
Route::post("/photoUpload", 'ProfileController@UserProfilePhotoUpdate')->middleware('loginCheck');

Route::post("/host-details", 'ProfileController@HostDetails')->middleware('loginCheck');
Route::post("/host-update", 'ProfileController@UpdateHostDetails')->middleware('loginCheck');
Route::post("/photoUploadHost", 'ProfileController@HostProfilePhotoUpdate')->middleware('loginCheck');

Route::post("/add-event", 'EventController@AddEvent')->middleware('loginCheck');

Route::get("/get-event-data", "EventController@GetEventDetails")->middleware('loginCheck');

Route::post("/event-details", 'EventController@EventDetailsforEdit')->middleware('loginCheck');
Route::post("/event-details-modal", 'EventController@EventDetailsforModal');
Route::post("/event-update", 'EventController@EventUpdate')->middleware('loginCheck');
Route::post("/event-delete", 'EventController@EventDelete')->middleware('loginCheck');
Route::post('/register-event-by-user','EventController@UserRegistrationOnEvent')->middleware('loginCheck');
Route::post('/status','EventController@userStatus')->middleware('loginCheck');
Route::post('/updateUserStatus','EventController@updateUserStatus')->middleware('loginCheck');





Route::get('/pdf', function () {
    return view('pdf');
});

