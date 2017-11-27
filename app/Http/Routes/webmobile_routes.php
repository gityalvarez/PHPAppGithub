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