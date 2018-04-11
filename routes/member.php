<?php

Auth::routes();
Route::get('/logout', ['uses' => 'Auth\LoginController@logout']);
Route::group(['middleware' => ['auth', 'member']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
});
