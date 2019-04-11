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

	Route::get('/job-search-result','JobController@searchResult')->name('job-search-result');

});

Route::get('/design', function() {
    return view('layouts.design');
});