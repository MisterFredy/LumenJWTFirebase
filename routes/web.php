<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {return $router->app->version();});


//User route

Route::post('/auth/login','AuthController@authenticate');
Route::post('/auth/register','userCtrl@registeruser');

$router->group(
    ['middleware' => 'jwt.auth'], 
    function() use ($router) {
        Route::get('/finduser','userCtrl@getuser');
        Route::get('/profiluser/{iduser}','userCtrl@profiluser');
        Route::get('/halamanuser/{iduser}','userCtrl@halamanuser');
        Route::post('/tambahpost','postCtrl@posting');
        Route::get('/post/{idpost}','postCtrl@lihatposting');
    }
);