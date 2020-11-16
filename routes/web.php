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
Route::get('/clearcards','ShopController@clearCard');
Route::post('/deletecards','ShopController@deletecards');
Route::post('/sendzakaz','ShopController@sendzakaz');



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

Route::get('/pageadmin/pagelist','PageController@pagelist')
    ->name('admin.page');
Route::get('/pageadmin/pagelist/add','PageController@create')
    ->name('admin.page.add');
Route::post('/pageadmin/pagelist/store','PageController@store')
    ->name('admin.page.store');

Route::get('/fotocatadmin/list','FotocatController@fotocat')
    ->name('admin.fotocat');

Route::get('/fotocatadmin/list/{id}','GallaryController@showfotoAdmin')
    ->name('admin.gallarylist');
Route::get('/fotocatadmin/addfooto','GallaryController@storefoto')
    ->name('admin.gallary.add');
Route::post('/fotocatadmin/createfooto','GallaryController@createfoto')
    ->name('admin.gallary.store');

Route::get('/fotocatadmingal/delete/{id}','GallaryController@deletefoto')
    ->name('admin.gallary.delete');
Route::get('/fotocatadminfoto/delete/{id}','GallaryController@deletecatfoto')
    ->name('admin.fotocat.delete');

Route::get('/newsadmin/list','NewController@ListAdmin')
    ->name('admin.news.list');
Route::get('/newsadmin/create','NewController@create')
    ->name('admin.news.create');
Route::post('/newsadmin/store','NewController@store')
    ->name('admin.news.store');



Route::get('/mylogin', 'PageController@Mylogin')->name('mylogin');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/shopgroup/{id}', 'ShopController@index')->name('shop.showgroup');
Route::get('/newlist','NewController@index')->name('page.news');
Route::get('/newsdetal/{id}','NewController@show')->name('page.news.detal');
Route::get('/gallaryfoto','GallaryController@showlist')->name('page.showlist');
Route::get('/gallaryfoto/{id}','GallaryController@showfoto')->name('gallary.foto');

Route::get('/{slug}','PageController@showpage')->name('page.show');
Route::post('/sendzaivka', 'ApiController@sendZaivka');
Route::post('/addtovar', 'ApiController@addtovar');
Route::post('/showcards', 'ApiController@getCardBuy');


