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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     //return view('welcome2');
// });
Route::get('/', 'StartController@index')->name('start');
Route::get('/setcookie/{id}', 'StartController@setCookie')->name('setcookie');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['middleware' => ['auth']], function () {
    
    /* strefa tylko ADMIN */
    Route::group(['middleware' => ['admin']], function () {
        Route::get('/admin','Admin\AdminController@index')->name('admin');
        // Route::resource('/unit', 'Admin\UnitController');
        Route::group(['prefix'=>'admin'], function () {
            Route::resource('/unit', 'Admin\UnitController',['as' =>'admin']);
           // Route::resource('/', 'Admin\AdminDashboardController',['as' =>'admin']);
           Route::resource('/plan', 'Admin\PlanController',['as' => 'admin']);
           Route::resource('/market', 'Admin\MarketController',['as' => 'admin']);
           Route::resource('/category', 'Admin\CategoryController',['as' => 'admin']);
           Route::resource('/feature', 'Admin\FeatureController',['as' => 'admin']);
          // Route::resource('/payment', 'Admin\PaymentController',['as' => 'admin']);
          // Route::resource('/article', 'Admin\ArticleController',['as' => 'admin']);
         //  Route::resource('/image', 'Admin\ArticleimageController',['as' => 'admin']);
        });
    });
    /* strefa tylko FARMER */
    Route::group(['middleware' => ['farmer']], function () {
        Route::get('/panel','Farmer\DashboardController@index')->name('panel');
        Route::get('/ajax_cat','Farmer\ArticleController@ajax_category')->name('ajax_cat');
        Route::get('/ajax_cat_detail/{id}','Farmer\ArticleController@ajax_category_child')->name('farmer.ajax_cat_detail');
        // Route::group(['prefix'=>'farmer'], function () {
            Route::resource('/profil', 'Farmer\FarmerController',['as'=>'farmer']);
            Route::resource('/payment', 'Farmer\PaymentController',['as'=>'farmer']);
            Route::resource('/market', 'Farmer\MarketController',['as'=>'farmer']);
            Route::resource('/article', 'Farmer\ArticleController',['as'=>'farmer']);
         //   Route::resource('/artimages/{idarticle}', 'Farmer\ArticleImagesController',['as'=>'farmer']);
           Route::get('/artimages/{id}/create','Farmer\ArticleImagesController@create')->name('farmer.artimages.create');
           Route::post('/artimages','Farmer\ArticleImagesController@store')->name('farmer.artimages.store');
           Route::delete('/artimages/{id}','Farmer\ArticleImagesController@destroy')->name('farmer.artimages.destroy');
        // });
    });

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
