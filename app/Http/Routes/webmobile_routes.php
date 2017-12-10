<?php

/*
|--------------------------------------------------------------------------
| WEBMOBILE Routes
|--------------------------------------------------------------------------
|
| Here is where all WEBMOBILE routes are defined.
*/

Route::get('index', ['as'=> 'index', 'uses' => 'WebMobile\IndexController@index']);
Route::get('login/{provider}', ['as'=> 'login/{provider}', 'uses' => 'Auth\AuthController@redirectToProvider']);
Route::get('login/{provider}/callback', ['as'=> 'login/{provider}/callback', 'uses' => 'Auth\AuthController@handleProviderCallback']);
Route::get('articulos', ['as'=> 'articulos', 'uses' => 'WebMobile\ArticuloController@index']);
Route::get('comercios', ['as'=> 'comercios', 'uses' => 'WebMobile\ComercioController@index']);
Route::get('pedidos', ['as'=> 'pedidos', 'uses' => 'WebMobile\PedidoController@index']);
Route::get('perfil', ['as'=> 'perfil', 'uses' => 'WebMobile\PerfilController@index']);

Route::post('registrar','Auth\AuthController@registrar');