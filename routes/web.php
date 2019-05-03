<?php

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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::group(['middleware' => 'auth'], function(){

	// Route::get('/home', 'HomeController@index')->name('home');

	Route::get('/user-info/upload-cv','UserInfoController@uploadCv')->name('upload-cv');

	Route::post('/user-info/upload-cv','UserInfoController@saveCv')->name('save-cv');

	Route::get('/user-info/step1', 'UserInfoController@step1')->name('step1');

	Route::post('/user-info/step1', 'UserInfoController@step1Update')->name('step1Update');

	Route::get('/user-info/step2', 'UserInfoController@step2')->name('step2');

	Route::post('/user-info/step2', 'UserInfoController@step2Update')->name('step2Update');

	Route::get('/moncv','PageController@moncv')->name('moncv');

	Route::get('/download-cv','PageController@getDownload')->name('download-cv');

	Route::get('notifications', 'PageController@notifications')->name('notifications');

	Route::get('notification', 'PageController@notification')->name('notification');

	Route::get('notification/{id}', 'PageController@editNotification')->name('edit-notification');

	Route::post('notification/{id?}', 'PageController@saveNotification')->name('save-notification');

	Route::delete('notification/{id?}', 'PageController@deleteNotification')->name('delete-notification');

	Route::get('jobs-saved','JobController@savedJobs')->name('jobs-saved');
	
	Route::get('jobs-applied','JobController@appliedJobs')->name('jobs-applied');

	Route::delete('remove-fav/{id}','JobController@removeFav')->name('remove-fav');

	Route::get('update-password','UserInfoController@updatePassword')->name('update-pwd');
	Route::post('update-password','UserInfoController@savePassword')->name('update-pwd');
});
Route::get('search-job','JobController@searchJobs')->name('search-job');

Route::post('search-job','JobController@searchJobsPost')->name('search-job-post');

Route::get('/jobs/{from?}/{to?}/{cat?}/{loc?}','JobController@jobs')->name('jobs');

Route::get('/job/{id}/{action?}','JobController@job')->name('job');

Route::post('/job/{id}','JobController@applyJob')->name('apply-job');
