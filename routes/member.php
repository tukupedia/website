<?php

Auth::routes();
Route::get('/logout', ['uses' => 'Auth\LoginController@logout']);
Route::group(['middleware' => ['auth', 'user']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
});
