<?php

/*
|--------------------------------------------------------------------------
| FRONTEND Routes
|--------------------------------------------------------------------------
|
| Here is where all FRONTEND routes are defined.
|
*/

/*Route::get('/', function () {
    return view('frontend.articulos.index');
});*/

Route::get('/', ['as'=> 'frontend.articulos.index', 'uses' => 'ArticuloController@index']);

Route::get('articulos', ['as'=> 'frontend.articulos.index', 'uses' => 'ArticuloController@index']);

Route::get('articulos/{articulos}', ['as'=> 'frontend.articulos.show', 'uses' => 'ArticuloController@show']);

Route::get('comercios', ['as'=> 'frontend.comercios.index', 'uses' => 'ComercioController@index']);

Route::get('comercios/{comercios}', ['as'=> 'frontend.comercios.show', 'uses' => 'ComercioController@show']);

Route::get('mapacomercios', ['as'=> 'frontend.comercios.mapeo', 'uses' => 'ComercioController@mapeo']);
