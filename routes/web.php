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

use App\Http\Controllers\testApiController;
use App\Http\Controllers\Traveller\BlogController;
use App\Http\Controllers\Traveller\PackageController;
use App\Models\Blog;
use App\Models\BoatTravelPackage;
use App\Models\BoatTravelTrip;

Route::get('/', function () {
    $data['packages'] = BoatTravelPackage::get();
    $data['trips'] = BoatTravelTrip::get();
    $data['blogs'] = Blog::limit(9)->get();
    return view('traveller.id.home', $data);
});


Route::get('/packages', function () {
    $data['trips'] = BoatTravelTrip::get();
    return view('traveller.id.packages.packages', $data);
})->name('packages');
Route::get('/packages/{id}', [PackageController::class, 'show'])->name('packages.detail');
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{slug}', [BlogController::class, 'show'])->name('blogs.show');
Route::get('/auth-user', 'Auth\AuthController@loginPage')->name('auth.page');
Route::post('/auth-user', 'Auth\AuthController@loginUser')->name('auth.submit');

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['user.info']], function () {
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


