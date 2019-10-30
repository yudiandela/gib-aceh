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

Auth::routes(['verify' => true]);

Route::get('/', 'RootController');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', 'DashboardController')->name('dashboard');

    // UserManagement CRUD
    Route::get('user', 'UserController@index')->name('user');
    Route::post('user', 'UserController@store');
    Route::delete('user/{user}', 'UserController@destroy')->name('user.destroy');

    // Profile CRUD
    Route::get('profile', 'ProfileController@index')->name('profile');
    Route::post('profile', 'ProfileController@store');
    Route::put('profile/{profile}', 'ProfileController@update')->name('profile.update');

    Route::middleware('admin')->group(function () {
        Route::patch('profile/{profile}', 'ProfileController@update');
    });
});
