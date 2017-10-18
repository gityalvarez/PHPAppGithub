<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');


/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {
    Route::group(['prefix' => 'v1'], function () {
        require config('infyom.laravel_generator.path.api_routes');
    });
});


/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {
    Route::group(['prefix' => 'v1'], function () {
        require config('infyom.laravel_generator.path.api_routes');
    });
});


Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('backend/categorias', ['as'=> 'backend.categorias.index', 'uses' => 'Backend\CategoriaController@index']);
Route::post('backend/categorias', ['as'=> 'backend.categorias.store', 'uses' => 'Backend\CategoriaController@store']);
Route::get('backend/categorias/create', ['as'=> 'backend.categorias.create', 'uses' => 'Backend\CategoriaController@create']);
Route::put('backend/categorias/{categorias}', ['as'=> 'backend.categorias.update', 'uses' => 'Backend\CategoriaController@update']);
Route::patch('backend/categorias/{categorias}', ['as'=> 'backend.categorias.update', 'uses' => 'Backend\CategoriaController@update']);
Route::delete('backend/categorias/{categorias}', ['as'=> 'backend.categorias.destroy', 'uses' => 'Backend\CategoriaController@destroy']);
Route::get('backend/categorias/{categorias}', ['as'=> 'backend.categorias.show', 'uses' => 'Backend\CategoriaController@show']);
Route::get('backend/categorias/{categorias}/edit', ['as'=> 'backend.categorias.edit', 'uses' => 'Backend\CategoriaController@edit']);


Route::get('backend/personas', ['as'=> 'backend.personas.index', 'uses' => 'Backend\PersonaController@index']);
Route::post('backend/personas', ['as'=> 'backend.personas.store', 'uses' => 'Backend\PersonaController@store']);
Route::get('backend/personas/create', ['as'=> 'backend.personas.create', 'uses' => 'Backend\PersonaController@create']);
Route::put('backend/personas/{personas}', ['as'=> 'backend.personas.update', 'uses' => 'Backend\PersonaController@update']);
Route::patch('backend/personas/{personas}', ['as'=> 'backend.personas.update', 'uses' => 'Backend\PersonaController@update']);
Route::delete('backend/personas/{personas}', ['as'=> 'backend.personas.destroy', 'uses' => 'Backend\PersonaController@destroy']);
Route::get('backend/personas/{personas}', ['as'=> 'backend.personas.show', 'uses' => 'Backend\PersonaController@show']);
Route::get('backend/personas/{personas}/edit', ['as'=> 'backend.personas.edit', 'uses' => 'Backend\PersonaController@edit']);


Route::get('backend/comercios', ['as'=> 'backend.comercios.index', 'uses' => 'Backend\ComercioController@index']);
Route::post('backend/comercios', ['as'=> 'backend.comercios.store', 'uses' => 'Backend\ComercioController@store']);
Route::get('backend/comercios/create', ['as'=> 'backend.comercios.create', 'uses' => 'Backend\ComercioController@create']);
Route::put('backend/comercios/{comercios}', ['as'=> 'backend.comercios.update', 'uses' => 'Backend\ComercioController@update']);
Route::patch('backend/comercios/{comercios}', ['as'=> 'backend.comercios.update', 'uses' => 'Backend\ComercioController@update']);
Route::delete('backend/comercios/{comercios}', ['as'=> 'backend.comercios.destroy', 'uses' => 'Backend\ComercioController@destroy']);
Route::get('backend/comercios/{comercios}', ['as'=> 'backend.comercios.show', 'uses' => 'Backend\ComercioController@show']);
Route::get('backend/comercios/{comercios}/edit', ['as'=> 'backend.comercios.edit', 'uses' => 'Backend\ComercioController@edit']);
