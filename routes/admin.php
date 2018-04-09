<?php

Route::group(['prefix' => '/webmaster'], function () {
    Auth::routes();

    Route::get('home', ['middleware' => ['auth', 'admin'], 'uses' => "HomeController@webmasterPage"]);
});
