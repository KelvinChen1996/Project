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

Route::get('/', function () {
    return view('welcome');
});

Route::get('index', 'Web_Controller\AppController@index');
Route::get('', 'Web_Controller\AppController@index');
Route::get('login_page', 'Web_Controller\UserController@login_page');
Route::post('login', 'Web_Controller\UserController@login');
Route::post('register', 'Web_Controller\UserController@register');
Route::get('logout', 'Web_Controller\UserController@logout');


//admin
Route::get('admin_login_page', 'Web_Controller\AdminController@login_page');
Route::post('admin_login', 'Web_Controller\AdminController@login');
Route::group(['middleware' => 'auth.admin'], function () {
    Route::get('admin/logout', 'Web_Controller\AdminController@logout');
    Route::get('admin/', 'Web_Controller\AdminController@manage_store');
    Route::get('admin/manage_store', 'Web_Controller\AdminController@manage_store');
    Route::post('admin/reject_store', 'Web_Controller\AdminController@reject_store');
    Route::post('admin/accept_store', 'Web_Controller\AdminController@accept_store');
    Route::get('admin/manage_user', 'Web_Controller\AdminController@manage_user');
    Route::post('admin/set_nonactive_user', 'Web_Controller\AdminController@set_nonactive_user');
    Route::post('admin/set_active_user', 'Web_Controller\AdminController@set_active_user');
    Route::get('admin/manage_product', 'Web_Controller\AdminController@manage_product');
    Route::post('admin/reject_product', 'Web_Controller\AdminController@reject_product');
    Route::post('admin/accept_product', 'Web_Controller\AdminController@accept_product');
   

    Route::get('admin/product_active', 'Web_Controller\AdminController@product_active');
    Route::post('admin/set_nonactive_product', 'Web_Controller\AdminController@set_nonactive_product');
});