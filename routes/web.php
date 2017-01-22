<?php declare(strict_types = 1);

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
Route::any('/partners/edit', 'Rapyd\PartnerController@getEdit');
Route::any('/partners/grid', 'Rapyd\PartnerController@getGrid');

Route::any('/gifts/edit', 'Rapyd\GiftController@getEdit');
Route::any('/gifts/grid', 'Rapyd\GiftController@getGrid');

Route::any('/users/edit', 'Rapyd\UserController@getEdit');
Route::any('/users/grid', 'Rapyd\UserController@getGrid');

Route::any('/customers/edit', 'Rapyd\CustomerController@getEdit');
Route::any('/customers/grid', 'Rapyd\CustomerController@getGrid');

Route::any('/posts/edit', 'Rapyd\PostController@getEdit');
Route::any('/posts/grid', 'Rapyd\PostController@getGrid');

/*
 * JSON routes
 */
Route::any('/json/getuser/{userCode}', 'JsonController@getUser');
Route::any('/json/getcustomer/{customerCode}', 'JsonController@getCustomer');

Route::any('/json/login/', 'JsonController@loginUser');
Route::any('/json/register/', 'JsonController@registerUser');

Route::any('/json/getpartners/', 'JsonController@getPartners');
Route::any('/json/getgifts/', 'JsonController@getGifts');
Route::any('/json/getnews/', 'JsonController@getNews');

/*
 * Auth routes
 */
Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


/*
 * Customer  routes
 */

Route::get('/buy', 'BuyController@index');
Route::post('/buy', 'BuyController@post');
