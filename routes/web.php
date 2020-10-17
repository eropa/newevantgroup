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

Route::get('/', 'PageController@index');


Route::get('/users/list','UserController@user_admin')
    ->name('admin.users');
Route::get('/infoblock/list','UserController@user_infoblock')
    ->name('admin.infoblock');
Route::get('/infoblock/edit/{id}','InfoblokController@edit')
    ->name('admin.infoblock.edit');
Route::post('/infoblock/update','InfoblokController@update')
    ->name('admin.infoblock.update');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
