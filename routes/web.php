<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingsController;
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
    return view('index');
})->name('index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'UserController')->except(['show']);
    Route::get('adduser', [UserController::class, 'addUser'])->name('users.addUser');
    Route::get('settings', [SettingsController::class, 'index'])->name('users.settings');
    ///////////////////////////////////////
    //laravel v7 and canceld in version 8//
    //////////////////////////////////////
	// Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	// Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    // Route::put('profile/password', ['as' => 'profile.password', 'uses' => [ProfileController::class, 'password']]);

	Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
	// Route::get('upgrade', function () {
    //     return view('pages.upgrade');
    // })->name('upgrade'); 
    Route::get('map', function () {
        return view('pages.maps');
    })->name('map');
    Route::get('icons', function () {
        return view('pages.icons');
    })->name('icons'); 
    Route::get('table-list', function () {
        return view('pages.tables');
    })->name('table');
	Route::put('profile/password', [ProfileController::class, 'password'])->name('profile.password');
});

Auth::routes();
