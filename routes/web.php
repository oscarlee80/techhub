<?php

Route::get('/', 'HomeController@index')->name('home');

Route::get('faq', function () { return view('faq'); });

Route::get('/results', 'SearchController@search');

Auth::routes();

Route::group(['prefix' => 'products'], function() {
    Route::get('/', 'ProductController@index');
    Route::get('/create', 'ProductController@create')->middleware('admin')->name('addProduct');
    Route::post('/create', 'ProductController@store')->middleware('admin');
    Route::get('/{id}/edit', 'ProductController@edit')->middleware('admin');
    Route::patch('/{id}/edit', 'ProductController@update')->middleware('admin');
    Route::delete('/{id}', 'ProductController@destroy')->middleware('admin');
    Route::get('/{id}', 'ProductController@show');
});

Route::group(['prefix' => 'categories'], function() {
    Route::get('/', 'CategoryController@index');
    Route::get('/create', 'CategoryController@create')->middleware('admin')->name('addCategory');
    Route::post('/create', 'CategoryController@store')->middleware('admin');
    Route::get('/{id}/edit', 'CategoryController@edit')->middleware('admin');
    Route::patch('/{id}/edit', 'CategoryController@update')->middleware('admin');
    Route::delete('/{id}', 'CategoryController@destroy')->middleware('admin')->name('delCategory');
    Route::get('/{id}', 'CategoryController@show');
});

Route::group(['prefix' => 'cart'], function() {
    Route::get('/', 'CartController@index')->middleware('cartSession');
    Route::get('/add/{product}', 'CartController@add')->middleware('notGuest', 'cartSession');
    Route::get('/remove/{product_id}', 'CartController@remove')->middleware('notGuest', 'cartSession');
    Route::get('/checkout', 'CartController@checkout')->middleware('notGuest', 'cartSession');
    Route::get('/flush', 'CartController@flush')->middleware('notGuest', 'cartSession');
    Route::patch('/', 'CartController@update')->middleware('notGuest', 'cartSession')->name('cart.update');
});


Route::group(['prefix' => 'backoffice'], function () {
    Route::get('/', 'BackOfficeController@index')->middleware('admin')->name('backoffice');

    Route::get('/products', 'BackOfficeController@products')->middleware('admin')->name('productCrud');
    Route::get('/products/export', 'BackOfficeController@exportProducts')->middleware('admin')->name('exportProducts');
    Route::get('/product/{id}', 'BackOfficeController@showProduct')->middleware('admin');

    Route::get('/categories', 'BackOfficeController@categories')->middleware('admin')->name('categoriesCrud');
    Route::get('/categories/export', 'BackOfficeController@exportCategories')->middleware('admin')->name('exportCategories');
    Route::get('/category/{id}', 'BackOfficeController@showCategory')->middleware('admin');

    Route::get('/users', 'BackOfficeController@users')->middleware('superAdmin')->name('usersCrud');
    Route::get('/users/export', 'BackOfficeController@exportUsers')->middleware('superAdmin')->name('exportUsers');
    Route::get('/users/{id}', 'BackOfficeController@showUser')->middleware('superAdmin');
    Route::get('/users/{id}/edit', 'BackOfficeController@editUser')->middleware('superAdmin');
    Route::patch('/users/{id}/edit', 'BackOfficeController@updateUser')->middleware('superAdmin');
    Route::delete('/users/{id}', 'BackofficeController@destroyUser')->middleware('admin');
});


Route::group(['prefix' => 'profile'], function () {
    Route::get('/{id}', 'ProfileController@show');
    Route::patch('/{id}', 'ProfileController@update');
});



Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');

Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
