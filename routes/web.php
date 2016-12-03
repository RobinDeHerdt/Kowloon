<?php

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
	// Vertaalde routes
	Route::get(LaravelLocalization::transRoute('routes.about'), 'AboutController@index');

	// Niet vertaalde routes
	Route::get('home', 'HomeController@index');
	Route::get('/', function() {
		return redirect('/home');
	});
	Route::get('category/{id}', 'ProductController@index');
});

// Geef de geselecteerde taal mee
Route::post('/{lang}/subscribe', 'SubscriberController@store');