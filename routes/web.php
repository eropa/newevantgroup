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
Route::get('/infoblock/foto','FotoController@index')
    ->name('admin.foto');
Route::get('/infoblock/foto/add','FotoController@add')
    ->name('admin.foto.add');
Route::post('/infoblock/foto/store','FotoController@store')
    ->name('admin.foto.store');
Route::get('/foto/edit/{id}','FotoController@edit')
    ->name('admin.foto.edit');
Route::post('/foto/update','FotoController@update')
    ->name('admin.foto.update');



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
