<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where all API routes are defined.
|
*/


Route::post('oauth/request', function() {
    return Response::json(Authorizer::issueAccessToken());
});

Route::group(['middleware' => ['oauth']], function () {
    Route::resource('user', 'UserController');
    Route::resource('articulo', 'ArticuloController');
    Route::resource('comercio', 'ComercioController');
    Route::resource('envio', 'EnvioController');
});




