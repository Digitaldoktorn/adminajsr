<?php



Auth::routes(['register' => false]);

// makes the login page the start page, and makes routes accessable from only logged in users
Route::group(['middleware' => ['web', 'auth']], function() {
    Route::resource('posts', 'PostController');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/board', 'BoardmemberController@index');
    Route::get('/localcontacts', 'PageController@localcontacts');
    Route::get('/', 'HomeController@index')->name('home');
});

Route::get('/posts/categories/{category}', 'CategoryController@index');