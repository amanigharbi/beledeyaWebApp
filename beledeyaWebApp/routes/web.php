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
    return view('welcome');
});
Auth::routes();

Route::get('/', 'HomeController@welcome')->name('welcome');

Route::group(['middleware' => ['auth', 'verifyEmail']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/documents', 'HomeController@documents')->name('documents');
    Route::get('/reclamation', 'HomeController@reclamation')->name('reclamation');
    Route::get('/about', 'HomeController@about')->name('about');
});


/**
 * Email verification
 */
Route::get('/verifyEmail', 'UserController@showVerifyEmail')->name('verifyEmail');
Route::get('/newCode', 'UserController@sendNewCode')->name('newCode');
Route::post('/verifyEmail', 'UserController@validEmailCode')->name('verifyEmail');
