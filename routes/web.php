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



Auth::routes();


Route::resource('produtos', 'ProdutosController');
Route::get('/', 'HomeController@index')->name('home.index');
Route::post('/fazer-pedido', 'HomeController@store')->name('home.store');

Route::resource('pedidos', 'PedidosController');