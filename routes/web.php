<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/register', 'RegisterController@create');
// Route::post('register', 'RegisterController@store');

// Route untuk user yang admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
    Route::get('/', function () {
        $data['users'] = \App\User::whereDoesntHave('roles')->get();
        return view('admin', $data);
    });
});
// Route untuk user yang member
Route::group(['prefix' => 'member', 'middleware' => ['auth', 'role:member']], function () {
    Route::get('/', function () {
        return view('member');
    });
});

Route::group(['prefix' => '/webmaster'], function () {
    Auth::routes();
});

Route::get('/home', 'HomeController@index')->name('home');
