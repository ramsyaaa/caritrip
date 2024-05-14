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

Route::get('admin', 'Admin\AdminController@index');
Route::resource('admin/page', 'Admin\\PageController');
Route::resource('admin/boat', 'Admin\\BoatController');
Route::resource('admin/boat-image', 'Admin\\BoatImageController');
Route::resource('admin/boat-travel-package', 'Admin\\BoatTravelPackageController');
Route::resource('admin/boat-travel-trip', 'Admin\\BoatTravelTripController');
Route::resource('admin/boat-travel-trip-image', 'Admin\\BoatTravelTripImageController');
Route::resource('admin/language', 'Admin\\LanguageController');
Route::resource('admin/blog', 'Admin\\BlogController');
Route::resource('admin/blog-category', 'Admin\\BlogCategoryController');