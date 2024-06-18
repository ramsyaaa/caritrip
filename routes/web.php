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

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Traveller\AboutUsController;
use App\Http\Controllers\Traveller\BlogController;
use App\Http\Controllers\Traveller\BoatController;
use App\Http\Controllers\Traveller\ContactController;
use App\Http\Controllers\Traveller\PackageController;
use Illuminate\Http\Request;

Route::get('/', [HomeController::class, 'index']);


Route::get('/packages', [PackageController::class, 'index'])->name('packages');
Route::get('/packages/{id}', [PackageController::class, 'show'])->name('packages.detail');
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{slug}', [BlogController::class, 'show'])->name('blogs.show');
Route::get('/about', [AboutUsController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/boats', [BoatController::class, 'index'])->name('boats');
Route::get('/auth-user', 'Auth\AuthController@loginPage')->name('auth.page');
Route::post('/auth-user', 'Auth\AuthController@loginUser')->name('auth.submit');

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('', 'Admin\AdminController@index')->name('index');
    Route::resource('page', 'Admin\\PageController');
    Route::resource('boat/{id}/images', 'Admin\\BoatImageController');
    Route::resource('boat/{id}/cabins', 'Admin\\BoatCabinController');
    Route::resource('boat', 'Admin\\BoatController');
    Route::resource('boat-travel-package/{id}/images', 'Admin\\BoatTravelPackageImageController');
    Route::resource('boat-travel-package/{id}/open-trip', 'Admin\\OpenTripController');
    Route::resource('boat-travel-package/{id}/private-trip', 'Admin\\PrivateTripController');
    Route::resource('boat-travel-package/{id}/full-day-cruise', 'Admin\\FullDayCruiseController');
    Route::resource('boat-travel-package', 'Admin\\BoatTravelPackageController');
    Route::resource('travel-package/{id}/images', 'Admin\\TravelPackageImageController');
    Route::resource('travel-package/{id}/open-trip', 'Admin\\TravelOpenTripController');
    Route::resource('travel-package/{id}/private-trip', 'Admin\\TravelPrivateTripController');
    Route::resource('travel-package', 'Admin\\TravelPackageController');
    Route::resource('language', 'Admin\\LanguageController');
    Route::resource('blog', 'Admin\\BlogController');
    Route::resource('destination', 'Admin\\DestinationController');
    Route::resource('blog-category', 'Admin\\BlogCategoryController');
});


