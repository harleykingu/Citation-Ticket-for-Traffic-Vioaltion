<?php

/*
|-----------------------|
|       Web Routes      |
|-----------------------|
*/


// Login & Register
Auth::routes();


// Homepage
Route::get('/', 'PageController@index')->name('homepage');

//Violation
Route::resource('violation', 'ViolationController');

//Jaywalking
Route::resource('jaywalking', 'JaywalkingController');
