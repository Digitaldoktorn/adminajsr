<?php

Route::get('/', 'PostController@index');
Route::get('/board', 'BoardmemberController@index');

//Route::get('/board', 'PageController@board');

Route::get('/localcontacts', 'PageController@localcontacts');

Route::resource('posts', 'PostController');
Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('boardmembers', 'BoardmemberController');
