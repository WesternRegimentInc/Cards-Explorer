<?php

Route::get('/','StartController@index')->name('homepage');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*///////////////////
 * Admin routes ////
*//////////////////
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

	//Handle admin login and password reset here....
	Route::group(['middleware' => ['admin_guest']], function(){
		Route::get('/login', 'LoginController@showLoginForm')->name('admin.login');
		Route::post('/login', 'LoginController@login')->name('admin.login.post');
		//Route::post('/reset', 'LoginController@login')->name('admin.login.post');
	});

	Route::group(['middleware' => 'admin_auth'], function(){

		//Start your life here...
		Route::get('/', 'DashBoardController@index')->name('admin.dashboard');
		Route::get('/dashboard', 'DashBoardController@index')->name('admin.dashboard');//Dashboard routes
		/*
		 * Handling Users and Admin
		 */
		// Admin
		Route::get('/list', 'AdminController@index')->name('admin.list');
		Route::get('/list/{id}/view', 'AdminController@show')->name('admin.view');
		Route::get('/profile/me', 'AdminController@profile')->name('admin.user.profile');
		Route::get('/create', 'AdminController@create')->name('admin.create');
		Route::post('/create', 'AdminController@store')->name('admin.create');
		Route::get('/{id}/edit', 'AdminController@edit')->name('admin.edit');
		Route::post('/{id}/edit', 'AdminController@update')->name('admin.edit');
		Route::get('/{id}/delete', 'AdminController@destroy')->name('admin.delete');
		Route::post('/logout', 'AdminLoginController@logout')->name('admin.logout');
		//users
		Route::get('/users/list', 'AdminController@admin')->name('admin.user.list');
		Route::get('/user/{id}/delete', 'AdminController@destroy')->name('admin.user.delete');

		/*
		 * Handling Cards
		 */
		Route::get('/cards/list', 'CardsController@index')->name('admin.cards');
		Route::get('/card/{slug}/view', 'CardsController@index')->name('admin.card.view');
		Route::get('/card/details/{slug}','CardsController@show')->name('admin.card.details');
		Route::get('/card/create','CardsController@create')->name('admin.card.create');
		Route::post('/card/create','CardsController@store')->name('admin.card.create');
		Route::get('/card/edit/{slug}','CardsController@edit')->name('admin.card.edit');
		Route::post('/card/edit/{slug}','CardsController@update')->name('admin.card.edit');
		Route::get('/card/activate/{slug}','CardsController@activate')->name('admin.card.activate');
		Route::get('/card/deactivate/{slug}','CardsController@deactivate')->name('admin.card.deactivate');
		//Route::get('/card/delete/{slug}','CardsController@destroy')->name('admin.card.delete');
		//Category
		Route::get('/cards/category', 'CardCategoryController@index')->name('admin.cards.category');
		Route::get('/cards/category/create', 'CardCategoryController@index')->name('admin.cards.category.create');
		Route::post('/cards/category/create', 'CardCategoryController@store')->name('admin.cards.category.create');
		Route::get('/cards/category/{id}/edit', 'CardCategoryController@edit')->name('admin.cards.category.edit');
		Route::post('cards/category/{id}/update', 'CardCategoryController@update')->name('admin.cards.category.update');
		Route::get('/cards/category/{id}/delete', 'CardCategoryController@destroy')->name('admin.cards.category.delete');
		//Cards to Category
		//Route::get('/card/to/category', 'CardCategoryController@index')->name('admin.card.to.category');
	});
});
