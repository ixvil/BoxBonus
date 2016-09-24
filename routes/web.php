<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::any('/partners/edit', 'PartnerController@getEdit');
Route::any('/partners/grid', 'PartnerController@getGrid');

Route::any('/gifts/edit', 'GiftController@getEdit');
Route::any('/gifts/grid', 'GiftController@getGrid');

Route::any('/users/edit', 'UserController@getEdit');
Route::any('/users/grid', 'UserController@getGrid');