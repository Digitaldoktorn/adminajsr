<?php



Auth::routes(['register' => false]);

// makes the login page the start page, and makes routes accessable from only logged in users
Route::group(['middleware' => ['web', 'auth']], function() {
    Route::resource('posts', 'PostController');

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/board', 'BoardmemberController@index');

    Route::get('/localcontacts', 'PageController@localcontacts');

    Route::get('/admin', 'AdminController@indexAdmin');
    Route::get('/admin/create-user', 'AdminController@createUser');
    Route::get('/admin/{id}/edit-user', 'AdminController@editUser');
    Route::post('/admin/create-user', 'AdminController@storeUser')->name('storeUser');


    Route::get('/domains', 'PageController@domains');

    Route::get('/communication', 'PageController@communication');

    Route::get('/', 'HomeController@index')->name('home');
});

Route::get('/posts/categories/{category}', 'CategoryController@index');