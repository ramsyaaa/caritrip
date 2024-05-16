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
    return view('auth.login');
});
Route::get('/auth-user', 'Auth\AuthController@loginPage')->name('auth.page');
Route::post('/auth-user', 'Auth\AuthController@loginUser')->name('auth.submit');

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => '{lang}', ], function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('', 'Admin\AdminController@index')->name('index');
        Route::resource('page', 'Admin\\PageController');
        Route::resource('boat', 'Admin\\BoatController');
        Route::resource('boat-image', 'Admin\\BoatImageController');
        Route::resource('boat-travel-package', 'Admin\\BoatTravelPackageController');
        Route::resource('boat-travel-trip', 'Admin\\BoatTravelTripController');
        Route::resource('boat-travel-trip-image', 'Admin\\BoatTravelTripImageController');
        Route::resource('language', 'Admin\\LanguageController');
        Route::resource('blog', 'Admin\\BlogController');
        Route::resource('blog-category', 'Admin\\BlogCategoryController');
    });
});

