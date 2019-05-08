<?php

Route::get('/', 'PostController@index');
Route::get('/board', 'BoardmemberController@index');

Route::get('/localcontacts', 'PageController@localcontacts');

Route::resource('posts', 'PostController');
Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/home', function () {
//    $tasks = [
//        'From Laracast tutorial',
//        'Got to the market',
//        'Go to work',
//        'Go to concert'
//    ];
//
//    return view('home')->withTasks($tasks);
//});


// makes the login page the start page
Route::group(['middleware' => ['web', 'auth']], function() {

    Route::get('/', function () {
        return view('home');
    });
});
