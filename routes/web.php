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
Auth::routes();


Route::group(
[
	'prefix' 		=> LaravelLocalization::setLocale(),
	// Zet gekozen taal voor de url: vb. /nl/home
	'middleware' 	=> [ 'localeSessionRedirect', 'localizationRedirect'] 
	// Redirect naar /nl/home wanneer naar /home gesurft wordt
], 
function()
{
		
	Route::get('users', function ()    {
    	
	});

    Route::get('/', function () {
    	return view('welcome');
	});

	Route::get('/home', 'HomeController@index');
});
