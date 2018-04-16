<?php

Route::group(['prefix' => '/webmaster'], function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/login', ['uses' => 'Admin\AuthController@showLoginForm'])->name('admin.login');
        Route::post('/login', ['uses' => 'Admin\AuthController@login']);
    });
    Route::group(['middleware' => ['auth', 'admin']], function () {
        Route::get('/register', 'Admin\AdminController@showRegistrationForm')->name('admin.register');
        Route::post('/register', 'Admin\AdminController@register');
        Route::get('/', ['uses' => "Admin\HomeController@index"]);
        Route::get('/logout', ['uses' => 'Admin\AuthController@logout']);
    });
});
