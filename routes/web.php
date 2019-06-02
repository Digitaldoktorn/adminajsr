<?php



Auth::routes(['register' => false]);

// makes the login page the start page, and makes routes accessible for only logged in users
Route::group(['middleware' => ['web', 'auth']], function() {

//    name kräver 2 parametrar här, jag chansar på index
    Route::resource('/posts', 'PostController')->name('posts', 'index');

//    Route::resource('users', 'AdminController'); så här kan jag göra om jag skapar en UserController och döper om alla funktioner, dvs store istället för storeUser osv. Jag kan kopiera kod från AdminController sedan (vilken jag ej kommer att behöva)

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/localcontacts', 'PageController@localcontacts')->name('localcontacts');

    // making admin page accessible for admin only, see also kernel.php and AdminpageMiddleware.php
    Route::get('/admin', 'AdminController@indexAdmin')->name('admin')->middleware('adminpage');
//    Route::get('/admin', 'AdminController@indexAdmin')->name('admin');

    Route::get('/admin/create-user', 'AdminController@createUser')->name('createUser');
    Route::get('/admin/{id}/edit-user', 'AdminController@editUser')->name('editUser');
    Route::post('/admin/create-user', 'AdminController@storeUser')->name('storeUser');
    Route::put('/admin/{id}/update-user', 'AdminController@updateUser')->name('updateUser');
    Route::delete('/admin/{id}/delete-user', 'AdminController@destroyUser')->name('destroyUser');

    Route::get('/', 'HomeController@index')->name('home');
//    Route::get('/posts', 'PostController@indexCategories');
    Route::get('/posts/categories/{category}', 'CategoryController@index')->name('sortCategory');
});

//    policies
//Route::get('service/post/view', 'PostController@index');
Route::get('service/post/create', 'PostController@create');
Route::get('service/post/edit', 'PostController@edit');
Route::get('service/post/destroy', 'PostController@destroy');

//Route::get('service/admin/create-user', 'AdminController@createUser');
//Route::get('service/admin/edit-user', 'AdminController@editUser');
//Route::get('service/admin/destroy-user', 'AdminController@destroyUser');

