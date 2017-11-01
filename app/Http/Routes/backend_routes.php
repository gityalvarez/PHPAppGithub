<?php

/*
|--------------------------------------------------------------------------
| BACKEND Routes
|--------------------------------------------------------------------------
|
| Here is where all BACKEND routes are defined.
|
*/

Route::group(['prefix' => '/', 'middleware' => 'role:admin'], function() {
    Route::get('backend/categorias', ['as'=> 'backend.categorias.index', 'uses' => 'Backend\CategoriaController@index']);
    Route::post('backend/categorias', ['as'=> 'backend.categorias.store', 'uses' => 'Backend\CategoriaController@store']);
    Route::get('backend/categorias/create', ['as'=> 'backend.categorias.create', 'uses' => 'Backend\CategoriaController@create']);
    Route::put('backend/categorias/{categorias}', ['as'=> 'backend.categorias.update', 'uses' => 'Backend\CategoriaController@update']);
    Route::patch('backend/categorias/{categorias}', ['as'=> 'backend.categorias.update', 'uses' => 'Backend\CategoriaController@update']);
    Route::delete('backend/categorias/{categorias}', ['as'=> 'backend.categorias.destroy', 'uses' => 'Backend\CategoriaController@destroy']);
    Route::get('backend/categorias/{categorias}', ['as'=> 'backend.categorias.show', 'uses' => 'Backend\CategoriaController@show']);
    Route::get('backend/categorias/{categorias}/edit', ['as'=> 'backend.categorias.edit', 'uses' => 'Backend\CategoriaController@edit']);

    Route::get('backend/comercios', ['as'=> 'backend.comercios.index', 'uses' => 'Backend\ComercioController@index']);
    Route::post('backend/comercios', ['as'=> 'backend.comercios.store', 'uses' => 'Backend\ComercioController@store']);
    Route::get('backend/comercios/create', ['as'=> 'backend.comercios.create', 'uses' => 'Backend\ComercioController@create']);
    Route::put('backend/comercios/{comercios}', ['as'=> 'backend.comercios.update', 'uses' => 'Backend\ComercioController@update']);
    Route::patch('backend/comercios/{comercios}', ['as'=> 'backend.comercios.update', 'uses' => 'Backend\ComercioController@update']);
    Route::delete('backend/comercios/{comercios}', ['as'=> 'backend.comercios.destroy', 'uses' => 'Backend\ComercioController@destroy']);
    Route::get('backend/comercios/{comercios}', ['as'=> 'backend.comercios.show', 'uses' => 'Backend\ComercioController@show']);
    Route::get('backend/comercios/{comercios}/edit', ['as'=> 'backend.comercios.edit', 'uses' => 'Backend\ComercioController@edit']);

    Route::get('backend/productos', ['as'=> 'backend.productos.index', 'uses' => 'Backend\ProductoController@index']);
    Route::post('backend/productos', ['as'=> 'backend.productos.store', 'uses' => 'Backend\ProductoController@store']);
    Route::get('backend/productos/create', ['as'=> 'backend.productos.create', 'uses' => 'Backend\ProductoController@create']);
    Route::put('backend/productos/{productos}', ['as'=> 'backend.productos.update', 'uses' => 'Backend\ProductoController@update']);
    Route::patch('backend/productos/{productos}', ['as'=> 'backend.productos.update', 'uses' => 'Backend\ProductoController@update']);
    Route::delete('backend/productos/{productos}', ['as'=> 'backend.productos.destroy', 'uses' => 'Backend\ProductoController@destroy']);
    Route::get('backend/productos/{productos}', ['as'=> 'backend.productos.show', 'uses' => 'Backend\ProductoController@show']);
    Route::get('backend/productos/{productos}/edit', ['as'=> 'backend.productos.edit', 'uses' => 'Backend\ProductoController@edit']);
});

Route::group(['prefix' => '/', 'middleware' => 'role:gerente'], function() {
    Route::get('backend/articulos', ['as'=> 'backend.articulos.index', 'uses' => 'Backend\ArticuloController@index']);
    Route::post('backend/articulos', ['as'=> 'backend.articulos.store', 'uses' => 'Backend\ArticuloController@store']);
    Route::get('backend/articulos/create', ['as'=> 'backend.articulos.create', 'uses' => 'Backend\ArticuloController@create']);
    Route::put('backend/articulos/{articulos}', ['as'=> 'backend.articulos.update', 'uses' => 'Backend\ArticuloController@update']);
    Route::patch('backend/articulos/{articulos}', ['as'=> 'backend.articulos.update', 'uses' => 'Backend\ArticuloController@update']);
    Route::delete('backend/articulos/{articulos}', ['as'=> 'backend.articulos.destroy', 'uses' => 'Backend\ArticuloController@destroy']);
    Route::get('backend/articulos/{articulos}', ['as'=> 'backend.articulos.show', 'uses' => 'Backend\ArticuloController@show']);
    Route::get('backend/articulos/{articulos}/edit', ['as'=> 'backend.articulos.edit', 'uses' => 'Backend\ArticuloController@edit']);
});

Route::group(['prefix' => '/', 'middleware' => ['role:gerente|despachador']], function() {
    Route::get('backend/pedidos', ['as'=> 'backend.pedidos.index', 'uses' => 'Backend\PedidoController@index']);
    Route::post('backend/pedidos', ['as'=> 'backend.pedidos.store', 'uses' => 'Backend\PedidoController@store']);    
    Route::get('backend/pedidos/create', ['middleware' => 'role:gerente', 'as'=> 'backend.pedidos.create', 'uses' => 'Backend\PedidoController@create']);
    Route::put('backend/pedidos/{pedidos}', ['as'=> 'backend.pedidos.update', 'uses' => 'Backend\PedidoController@update']);
    Route::patch('backend/pedidos/{pedidos}', ['as'=> 'backend.pedidos.update', 'uses' => 'Backend\PedidoController@update']);
    Route::delete('backend/pedidos/{pedidos}', ['middleware' => 'role:gerente', 'as'=> 'backend.pedidos.destroy', 'uses' => 'Backend\PedidoController@destroy']);
    Route::get('backend/pedidos/{pedidos}', ['as'=> 'backend.pedidos.show', 'uses' => 'Backend\PedidoController@show']);
    Route::get('backend/pedidos/{pedidos}/edit', ['as'=> 'backend.pedidos.edit', 'uses' => 'Backend\PedidoController@edit']);
});


