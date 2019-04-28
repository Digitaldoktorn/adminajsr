<?php

Route::get('/', 'PostController@index');
Route::get('/boardmembers', 'BoardmemberController@index');

//Route::get('/board', 'PageController@board');

Route::get('/localcontacts', 'PageController@localcontacts');

Route::resource('posts', 'PostController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('boardmembers', 'BoardmemberController');
