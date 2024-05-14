<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'v1/article'], function () {
    Route::get('highlight', 'API\APIController@getHighlightArticle');
    Route::get('latest', 'API\APIController@getLatestArticle');
    Route::get('gallery', 'API\APIController@getGalleryArticle');
    Route::get('detail', 'API\APIController@getArticleDetail');
});

Route::group(['prefix' => 'v1/match'], function () {
    Route::get('schedule', 'API\APIController@getMatchSchedule');
    Route::get('group', 'API\APIController@getMatchGroup');
    Route::get('knock-out', 'API\APIController@getKnockOutMatch');
});

Route::group(['prefix' => 'v1/venue'], function () {
    Route::get('', 'API\APIController@getVenue');
});

Route::group(['prefix' => 'v1/event'], function () {
    Route::get('', 'API\APIController@getEvent');
    Route::get('detail', 'API\APIController@getEventDetail');
    Route::get('/journey', 'API\APIController@getEventJourney');
    Route::get('series', 'API\APIController@getEventSeries');
    Route::get('series/{slug}', 'API\APIController@getEventSeriesDetail');
});

Route::group(['prefix' => 'v1/section'], function () {
    Route::get('', 'API\APIController@getSection');
});