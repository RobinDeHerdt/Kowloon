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
	Route::get('faq', 'QuestionController@index');
	Route::get('search', 'SearchController@index');
	Route::get('about', 'ContactController@index');
	
	Route::get('category/{id}', 'CategoryController@index');
	Route::get('category/{category_id}/product/{product_id}', 'ProductController@index');
	
	Route::get('mail', function () {
    	return view('emails.nl.subscribed');
	});
});

// Geef de geselecteerde taal mee
Route::post('/{lang}/subscribe', 'SubscriberController@store');