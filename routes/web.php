<?php

include 'admin.php';
include 'member.php';

Route::get('/', function () {
    return view('welcome');
});
