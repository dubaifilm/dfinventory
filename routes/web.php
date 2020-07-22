<?php

use Illuminate\Support\Facades\Route;
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

// Use of Controllers Looks like this
Route::get('/','WelcomeController@welcome')->middleware('auth');
Route::get('/inventory/add_inventory','InventoryController@add')->middleware('auth');
Route::get('/inventory/edit_inventory/{id}','InventoryController@edit')->middleware('auth');
Route::get('/df/{id}', 'CategoryController@category')->middleware('auth');
Route::post('df/user', 'CategoryController@store')->middleware('auth');
Route::post('/inventory/add_inventory', 'InventoryController@new_item')->middleware('auth');
Route::post('/inventory/edit_inventory/{id}', 'InventoryController@edit_item')->middleware('auth');
Route::get('/del/{id}', 'InventoryController@del_item')->middleware('auth');
Route::get('/add_cart/{id}', 'InventoryController@add_cart')->middleware('auth');
Route::get('/remove_cart/{id}', 'InventoryController@remove_cart')->middleware('auth');
Route::post('/', 'InventoryController@out_cart')->middleware('auth');

Route::get('/team/{idsinglerecord}', 'TeamController@profile')->middleware('auth');
Route::get('/chart/chart', 'DateController@chart')->middleware('auth');
Route::post('/chart/chart', 'DateController@edchart')->middleware('auth');
Route::get('/chartin/{id}', 'DateController@editchart')->middleware('auth');
Route::post('/chartinpost/{id}', 'DateController@editpostchart')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
