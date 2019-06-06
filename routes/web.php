<?php


    Auth::routes(['register' => false]);

// makes the login page the start page, and makes routes accessible for only logged in users
    Route::group(['middleware' => ['web', 'auth']], function () {

        Route::resource('/posts', 'PostController')->name('posts', 'index');

        Route::get('/home', 'HomeController@index')->name('home');

        Route::get('/localcontacts', 'PageController@localcontacts')->name('localcontacts');

        // making admin page accessible for admin only, see also kernel.php and AdminpageMiddleware.php
        Route::get('/admin', 'AdminController@indexAdmin')->name('admin')->middleware('adminpage');

        Route::get('/admin/create-user', 'AdminController@createUser')->name('createUser');
        Route::get('/admin/{id}/edit-user', 'AdminController@editUser')->name('editUser');
        Route::post('/admin/create-user', 'AdminController@storeUser')->name('storeUser');
        Route::put('/admin/{id}/update-user', 'AdminController@updateUser')->name('updateUser');
        Route::delete('/admin/{id}/delete-user', 'AdminController@destroyUser')->name('destroyUser');

        Route::get('/', 'HomeController@index')->name('home');
        Route::get('/posts/categories/{category}', 'CategoryController@index')->name('sortCategory');
    });

//    policies
    Route::get('service/post/create', 'PostController@create');
    Route::get('service/post/edit', 'PostController@edit');
    Route::get('service/post/destroy', 'PostController@destroy');



