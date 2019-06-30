<?php

Route::get('/home', 'HomeController@index')->name('home');

Route::get('faq', function () { return view('faq'); });

Auth::routes();

Route::group(['prefix' => 'products'], function() {
    Route::get('/', 'ProductController@index');
    Route::get('/create', 'ProductController@create');
    Route::get('/{id}/edit', 'ProductController@edit');
    Route::patch('/{id}/edit', 'ProductController@update');
    Route::get('/{id}', 'ProductController@show');
    Route::post('/create', 'ProductController@store');
});

// Route::group(['prefix' => 'cart'], function() {
//     Route::get('/', 'CartController@index');
//     Route::get('/add/{movie_id}', 'CartController@add');
//     Route::get('/remove/{movie_id}', 'CartController@remove');
//     Route::get('/checkout', 'CartController@checkout');
//     Route::get('/flush', 'CartController@flush');
// });

Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');

Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
