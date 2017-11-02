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

//Rutas necesarias para manejo básico de la autenticación
Route::controllers(['auth' => 'Auth\AuthController', 'password' => 'Auth\PasswordController']);

Route::auth();
Route::get('/home', 'HomeController@index');

// Backend con middleware de autenticación, con rutas en Routes/backend_routes.php    
Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'admin'], function () {
        require_once __DIR__ . '/Routes/backend_routes.php';
    });
});

// Frontend sin autenticación con las rutas en Routes/frontend_routes.php
Route::group(['prefix' => 'frontend', 'namespace' => 'Frontend'], function () {
    require __DIR__ . '/Routes/frontend_routes.php';
});

Route::group(['prefix' => 'mobile', 'namespace' => 'WebMobile'], function () {
    require __DIR__ . '/Routes/webmobile_routes.php';
});

/*
Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});

*/
/*
Route::get('login/google', 'Auth\AuthController@redirectToProvider');
Route::get('login/google/callback', 'Auth\AuthController@handleProviderCallback');

*/
//Route::get('user',['middleware' => 'oauth','users' => 'UserController@index']);
