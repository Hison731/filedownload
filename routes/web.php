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
    return redirect(route('login'));
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::get('/newuser', 'UsersContoller@addnew')->name('newuser');
Route::post('/newuser', 'UsersContoller@create')->name('newuser');
Route::patch('/newuser', 'UsersContoller@update')->name('newuser');
Route::get('/deleteuser/{id}', 'UsersContoller@delete')->name('deleteuser');
Route::get('/edituser/{id}', 'UsersContoller@edit')->name('edituser');
Route::get('/myaccount', 'MyfilesController@index')->name('myaccount');
Route::get('/showfiles/{date}', 'MyfilesController@showfiles')->name('showfiles');
Route::get('/download/{date}', 'MyfilesController@download')->name('download');
Route::post('/myaccount', 'MyfilesController@show')->name('myaccount');
