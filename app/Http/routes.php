<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::post('/countriesdata', 'HomeController@index');


Route::get('partner/login','PartnerAuth\AuthController@showLoginForm');

Route::post('partner/login','PartnerAuth\AuthController@login');

Route::get('partner/logout','PartnerAuth\AuthController@logout');

Route::get('partner/register', 'PartnerAuth\AuthController@showRegistrationForm');

Route::post('partner/register', 'PartnerAuth\AuthController@register');

Route::group(['middleware' => ['guest']], function () {
    //Login Routes...
    
	Route::get('/partner/login','PartnerAuth\AuthController@showLoginForm');

    // Registration Routes...
    

});