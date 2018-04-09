<?php

Route::group(['prefix' => '/webmaster'], function () {
    Auth::routes();

    Route::get('admin_area', ['middleware' => ['auth', 'admin'], function () {
        return "this page requires that you be logged in and an Admin";
    }]);
});
