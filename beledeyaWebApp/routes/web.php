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

Route::group([
    'middleware' => ['api', 'cors'],
    'prefix' => 'api',
], function ($router) {
    Route::get('/', function () {
        return view('welcome');
    });
});



Auth::routes();

Route::get('/', 'HomeController@welcome')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/reclamation', 'ReclamationController@reclamation')->name('reclamation');
Route::post('/addReclamation', 'ReclamationController@store');
Route::get('/documents', 'DocumentsController@index')->name('documents');
Route::get('/about', 'HomeController@about')->name('about');


Route::group(['middleware' => ['auth', 'verifyEmail']], function () {
    Route::get('/taxes', 'TaxesController@index')->name('taxes');
    Route::get('/PermisConstruction', 'PermisConstructionController@index')->name('PermisConstruction');
    Route::get('/ReseauPublic', 'ReseauPublicController@index')->name('ReseauPublic');
    Route::post('/addDemande', 'ReseauPublicController@store');
});


/**
 * Email verification
 */
Route::get('/verifyEmail', 'UserController@showVerifyEmail')->name('verifyEmail');
Route::get('/newCode', 'UserController@sendNewCode')->name('newCode');
Route::post('/verifyEmail', 'UserController@validEmailCode')->name('verifyEmail');




/**
 * Socialite
 */

//Google
Route::get('auth/google', 'Auth\LoginController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');

//Facebook
Route::get('auth/facebook', 'Auth\LoginController@redirectToFacebook');
Route::get('auth/facebook/callback', 'Auth\LoginController@handleFacebookCallback');
