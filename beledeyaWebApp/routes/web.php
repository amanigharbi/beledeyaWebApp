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
use Illuminate\Support\Facades\Route;
// use Illuminate\Routing\Route;

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
Route::get('/reclamation', 'ReclamationController@reclamation')->name('reclamation');
Route::post('/addReclamation', 'ReclamationController@store');
Route::get('/checkReclam', 'ReclamationController@check');
Route::get('/documents', 'DocumentsController@showAll')->name('documents');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/downPdf/{id}', 'ReclamationController@down')->name('downPdf');


Route::group(['middleware' => ['auth', 'verifyEmail', 'user']], function () {
    Route::get('/taxes', 'TaxesController@index')->name('taxes');
    Route::get('/PermisConstruction', 'PermisConstructionController@autorisationBatir')->name('PermisConstruction');
    Route::post('/addDemandeConst', 'PermisConstructionController@store');
    Route::get('/checkAutorisation', 'PermisConstructionController@check');
    Route::get('/downPdf/{id}', 'PermisConstructionController@down')->name('downPdf');
    Route::get('/ReseauPublics', 'ReseauPublicController@showView')->name('ReseauPublic');
    Route::post('/addDemande', 'ReseauPublicController@store');
    Route::get('/downPdf/{id}', 'ReseauPublicController@down')->name('downPdf');
    
    Route::get('/home', 'HomeController@index')->name('home');
});


/**
 * Email verification
 */
Route::get('/verifyEmail', 'UserController@showVerifyEmail')->name('verifyEmail');
Route::get('/newCode', 'UserController@sendNewCode')->name('newCode');
Route::post('/verifyEmail', 'UserController@validEmailCode')->name('verifyEmail');

/**
 * Admin routes
 */
Route::group(
    ['middleware' => ['auth', 'verifyEmail', 'admin']],
    function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        });

        //Reclamations
        Route::resource('/reclamations', 'ReclamationController');
        //documents
        Route::resource('/document', 'DocumentsController');
        //Reseau public
        Route::resource('/ReseauPublic', 'ReseauPublicController');
        // autorisation batir
        Route::resource('/PermisConstructions', 'PermisConstructionController');
  
    }
);

/**
 * Socialite
 */

//Google
Route::get('auth/google', 'Auth\LoginController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');

//Facebook
Route::get('auth/facebook', 'Auth\LoginController@redirectToFacebook');
Route::get('auth/facebook/callback', 'Auth\LoginController@handleFacebookCallback');
