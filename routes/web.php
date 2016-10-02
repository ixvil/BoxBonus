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

/*
 * Routes for Rapyd Crud
 */
Route::any('/partners/edit', 'PartnerController@getEdit');
Route::any('/partners/grid', 'PartnerController@getGrid');

Route::any('/gifts/edit', 'GiftController@getEdit');
Route::any('/gifts/grid', 'GiftController@getGrid');

Route::any('/users/edit', 'UserController@getEdit');
Route::any('/users/grid', 'UserController@getGrid');

Route::any('/customers/edit', 'CustomerController@getEdit');
Route::any('/customers/grid', 'CustomerController@getGrid');

/*
 * JSON routes
 */
Route::any('/json/getuser/{userCode}', 'JsonController@getUser');

