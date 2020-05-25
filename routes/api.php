<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/category','Api\CategoryController@index');
Route::get('/category/{id}','Api\CategoryController@show');
Route::get('/news_main/{id}','Api\WelcomeController@news_main'); // strona startowa - news (4 rekordy)
Route::get('/bestsellers_main/{id}','Api\WelcomeController@bestsellers_main'); // strona startowa - Bestseller
Route::get('/promotions_main/{id}','Api\WelcomeController@promotions_main'); // strona startowa - Bestseller 

Route::get('{marketslug}/news/','Api\NewsController@index'); // strona News
Route::get('/bestsellers/{id}','Api\BestsellersController@index'); // strona Bestsellers 
Route::get('/promotions/{id}','Api\PromotionsController@index'); // strona Bestsellers 

Route::post('/login_store','Api\AuthController@login');
Route::post('/login2','Api\AuthController@login2');

Route::middleware('auth:api')->get('/current','Api\AuthController@currentUser');

Route::get('/product/{id}','Api\ProductController@getProduct');

// Route::post('/order','Api\OrderController@store');
// Route::post('/order2','Api\OrderController@store');
Route::middleware('auth:api')->post('/order2','Api\OrderController@store');