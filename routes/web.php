<?php

// Auth::routes();
Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout');

// Unlocalized routes
Route::get('/', 'LanguageController@index');
Route::get('setcookie', 'CookieController@store');
Route::post('/contact', 'ContactController@store');
Route::post('/switchlang', 'LanguageController@update');
Route::post('/{lang}/subscribe', 'SubscriberController@store');

// Localized routes
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
	// Route::get(LaravelLocalization::transRoute('routes.about'), 'AboutController@index');

	// Niet vertaalde routes
	Route::get('home', 'HomeController@index');

	Route::get('faq', 'FaqController@index');
	Route::get('search', 'SearchController@index');
	Route::get('about', 'ContactController@index');
	
	Route::get('category/{id}', 'CategoryController@index');
	Route::get('category/{category_id}/product/{product_id}', 'ProductdetailController@index');
});

// Admin routes
Route::group(['middleware' => 'auth'], function () {
	Route::post('admin/hotitems', 'HomeController@update');

    Route::get('admin/dashboard', 'AdminController@index');
    Route::get('admin/messages', 'MessageController@index');
    Route::get('admin/message/{id}', 'MessageController@show');

    Route::get('admin/products', 'ProductController@index');
    Route::get('admin/products/create', 'ProductController@create');
    Route::post('admin/products/create', 'ProductController@store');
    Route::get('admin/products/{id}', 'ProductController@show');
    Route::get('admin/products/{id}/edit', 'ProductController@edit');
    Route::post('admin/products/{id}/edit', 'ProductController@update');
    Route::post('admin/products/{id}/delete', 'ProductController@destroy');

    Route::get('admin/questions', 'QuestionController@index');
    Route::get('admin/questions/create', 'QuestionController@create');
    Route::post('admin/questions/create', 'QuestionController@store');
    Route::post('admin/questions/{id}/edit', 'QuestionController@update');
    Route::get('admin/questions/{id}', 'QuestionController@show');
    Route::get('admin/questions/{id}/edit', 'QuestionController@edit');
    Route::post('admin/questions/{id}/delete', 'QuestionController@destroy');
});