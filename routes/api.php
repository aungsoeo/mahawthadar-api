<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
#############################################################################################

/*1 api route for news **/
Route::get('/news', ['as' => 'news.index', 'uses' => 'Api\NewsController@index']);

Route::get('/news/show/{id}', ['as' => 'news.show', 'uses' => 'Api\NewsController@show']);

#############################################################################################

/*2 api route for booking **/
Route::post('/book', ['as' => 'book.postbook', 'uses' => 'Api\BookingController@postbook']);

#############################################################################################


/* 3 api route for gallery **/
Route::get('/gallery', ['as' => 'gallery.index', 'uses' => 'Api\GalleryController@index']);

#############################################################################################

/* 4 api route for contact **/
Route::post('/contact', ['as' => 'contact.postcontact', 'uses' => 'Api\ContactController@postContact']);

#############################################################################################

/* 5 api route for donation **/
Route::get('/donation', ['as' => 'donation.index', 'uses' => 'Api\DonationController@index']);

Route::post('/donation/donate', ['as' => 'donation.donate', 'uses' => 'Api\DonationController@postdonate']);

Route::get('/donation/show/{id}', ['as' => 'donation.show', 'uses' => 'Api\DonationController@show']);

Route::get('/donation/calender', ['as' => 'donation.calender', 'uses' => 'Api\DonationController@calender']);

#############################################################################################
/* 6 api route for histroy **/

Route::get('/history', ['as' => 'history.index', 'uses' => 'Api\HistoryController@index']);
//show post by id
Route::get('/history/show/{id}', ['as' => 'history.show', 'uses' => 'Api\HistoryController@show']);

#############################################################################################
/* 7 api route for histroy  not done need to in StaffController**/

Route::get('/staff/teacher', ['as' => 'staff.teacher', 'uses' => 'Api\StaffController@index']);

Route::get('/staff/timetable', ['as' => 'staff.timetable', 'uses' => 'Api\StaffController@timetable']);

#############################################################################################
/* 8 api route for histroy **/

Route::get('/home', ['as' => 'home.index', 'uses' => 'Api\HomeController@index']);
