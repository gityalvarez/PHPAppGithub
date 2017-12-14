<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where all API routes are defined.
|
*/


Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});

Route::post('registrar','UserController@create');

Route::group(['middleware' => ['oauth']], function () {
    Route::get('pedido/articulos/{id}', 'PedidoController@show');
    Route::get('user', 'UserController@index');
    Route::get('user/perfil', 'UserController@user');
    Route::get('articulo', 'ArticuloController@index');
    Route::get('comercio', 'ComercioController@index');   
    Route::get('pedido', 'PedidoController@index');
    Route::post('pedido/registrar', 'PedidoController@create');
});