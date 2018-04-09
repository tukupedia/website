<?php

include 'admin.php';

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/register', 'RegisterController@create');
// Route::post('register', 'RegisterController@store');

Route::get('/home', 'HomeController@index')->name('home');
