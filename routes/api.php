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
Route::get('/news/{id}','Api\WelcomeController@news');

Route::post('/login_store','Api\AuthController@login');
Route::post('/login2','Api\AuthController@login2');

Route::middleware('auth:api')->get('/current','Api\AuthController@currentUser');