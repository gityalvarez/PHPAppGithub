<?php

/*
|--------------------------------------------------------------------------
| WEBMOBILE Routes
|--------------------------------------------------------------------------
|
| Here is where all WEBMOBILE routes are defined.
*/

Route::get('index', ['as'=> 'index', 'uses' => 'IndexController@index']);
Route::get('articulos', ['as'=> 'articulos', 'uses' => 'ArticuloController@index']);
Route::get('locales', ['as'=> 'locales', 'uses' => 'LocalController@index']);
Route::get('pedidos', ['as'=> 'pedidos', 'uses' => 'PedidoController@index']);
Route::get('perfil', ['as'=> 'perfil', 'uses' => 'PerfilController@index']);