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

Route::get('/', 'HomeController@welcome')->name('');
Route::get('/shops', 'shopController@shop')->name('shop');
Route::get('/contact','HomeController@contact')->name('');
Route::post('/contact/post','HomeController@contactpost')->name('');
Auth::routes();

Route::get('/customer', 'HomeController@index')->name('');
Route::get('/catering-service', 'HomeController@index2')->name('');
Route::post('/product.store','ProductController@ProductStore')->name('product.store');
Route::get('/product-details/{id}', 'ProductController@productdetails')->name('productdetails');



Route::get('/carts', 'CartsController@index')->name('carts');
Route::post('/carts/store', 'CartsController@store')->name('carts.store');
Route::post('/carts/update/{id}', 'CartsController@update')->name('carts.update');
Route::post('/carts/delete/{id}', 'CartsController@destroy')->name('carts.delete');

Route::get('/checkout', 'CheckoutsController@index')->name('checkouts');
Route::post('/checkout/store', 'CheckoutsController@store')->name('checkouts.store');

Route::get('/profile','ProfileController@profile')->name('profile');
Route::post('/profile/update','ProfileController@profileupdate')->name('');


Route::group(['prefix' => 'admin'], function(){
	Route::get('/deshboard', 'Admin\AdminController@index')->name('backend.index');
		// Admin Login Routes
	  Route::get('/', 'Auth\Admin\LoginController@showLoginForm')->name('admin.login');
	  Route::post('/adminlogin-submit', 'Auth\Admin\LoginController@login')->name('admin.login.submit');
	  Route::post('/adminlogout-submit', 'Auth\Admin\LoginController@logout')->name('admin.logout');
	  Route::get('/user-list', 'Admin\AdminController@userList')->name('admin.user.list');

	  Route::post('/user-list-update/{id}', 'Admin\AdminController@userListUpdate')->name('user.list.update');
});