<?php

Route::get('/', 'PostController@index');
Route::resource('posts', 'PostController');