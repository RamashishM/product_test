<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//PAGES and FORMS

Route::get('/', 'ProcessController@indexlogin');

//show view homepage form
Route::get('/home', 'ProcessController@homepage');
Route::get('/createcategory', 'ProcessController@addcategory');
Route::post('/insertcategory', 'ProcessController@insertcategory');

//PROCESS CONTROLLER
//insert data
Route::post('/home', 'ProcessController@store');

//delete data
Route::post('/view', 'ProcessController@destroy');

//List all data 
Route::get('/view', 'ProcessController@index');
Route::get('/viewcategory', 'ProcessController@viewcategory');

//search data
Route::get('/search', 'ProcessController@show');

// edit and update data
Route::get('/edit/{id}', 'ProcessController@edit');
Route::get('/edit_cat/{id}', 'ProcessController@edit_cat');
Route::get('/delete_cat/{id}', 'ProcessController@delete_cat');

Route::post('/update', 'ProcessController@update');
Route::post('/update_category', 'ProcessController@update_category');

// Auth routes, login, register, forgot pass
Auth::routes();


?>