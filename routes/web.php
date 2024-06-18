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
use App\Http\Controllers\Traveller\AboutUsController;
use App\Http\Controllers\Traveller\BlogController;
use App\Http\Controllers\Traveller\BoatController;
use App\Http\Controllers\Traveller\ContactController;
use App\Http\Controllers\Traveller\PackageController;
use App\Models\Blog;
use App\Models\BoatTravelPackage;
use App\Models\BoatTravelTrip;
use App\Models\FullDayCruise;
use App\Models\OpenTrip;
use App\Models\PrivateTrip;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Http;
use App\Models\UserLog;
use Carbon\Carbon;
use Illuminate\Http\Request;

Route::get('/', function (Request $request) {
    $data['packages'] = BoatTravelPackage::get();
    $data['blogs'] = Blog::limit(9)->get();
    $openTripBoatTravelPackageIds = OpenTrip::distinct()
        ->pluck('boat_travel_package_id');
    $privateBoatTravelPackageIds = PrivateTrip::distinct()
        ->pluck('boat_travel_package_id');
    $FullDayCruiseBoatTravelPackageIds = FullDayCruise::distinct()
        ->pluck('boat_travel_package_id');

    $data['navbarOpenTrips'] = BoatTravelPackage::whereIn('id', $openTripBoatTravelPackageIds)->get();
    $data['navbarPrivateTrips'] = BoatTravelPackage::whereIn('id', $privateBoatTravelPackageIds)->get();
    $data['navbarFullDayCruises'] = BoatTravelPackage::whereIn('id', $FullDayCruiseBoatTravelPackageIds)->get();
    // Mendapatkan IP pengguna
    $ip = $request->ip();

    // Mendapatkan data lokasi berdasarkan IP
    $response = Http::get("http://ipinfo.io/{$ip}/json");
    $location = $response->json();

    // Mendapatkan informasi browser pengguna
    $agent = new Agent();
    $browser = $agent->browser();

    // Mendapatkan URL yang diakses
    $url = $request->url();

    // Mendapatkan tanggal hari ini
    $today = Carbon::today()->toDateString();

    // Mengecek apakah sudah ada entri untuk IP, URL, dan tanggal hari ini
    $existingLog = UserLog::where('ip_address', $ip)
        ->where('url', $url)
        ->where('browser', $browser)
        ->whereDate('access_date', $today)
        ->first();

    // Jika belum ada, simpan data baru
    if ($existingLog == null) {
        UserLog::create([
            'ip_address' => $ip,
            'country' => $location['country'] ?? 'Unknown',
            'browser' => $browser,
            'group_page' => "home",
            'url' => $url,
            'access_date' => $today,
        ]);
    }
    return view('traveller.id.home', $data);
});


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


