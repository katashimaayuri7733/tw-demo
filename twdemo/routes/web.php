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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'UserController@index');

Route::get('/model/create', 'UserController@create')->name('usermodelCreate');

Route::post('/model/store', 'UserController@store');

Route::get('/model/edit/{id}', 'UserController@edit');

Route::post('/model/update', 'UserController@update');

//Route::get('/model/delete/{id}', 'UserController@delete');

Route::post('/model/delete', 'UserController@delete');

Route::post('/model/copy', 'UserController@copy');




