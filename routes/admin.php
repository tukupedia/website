<?php

Route::group(['prefix' => '/webmaster'], function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/login', ['uses' => 'Admin\AuthController@showLoginForm']);
        Route::post('/login', ['uses' => 'Admin\AuthController@login']);
    });
    Route::group(['middleware' => ['auth', 'admin']], function () {
        Route::get('/', ['uses' => "Admin\HomeController@index"]);
        Route::get('/logout', ['uses' => 'Admin\AuthController@logout']);
    });
});
