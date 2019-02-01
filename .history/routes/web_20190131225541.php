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

$router->get('/', function () use ($router) {
    return 12345678;
});
/*-------------------------------------------------*/
/* ========>RUTA PARA LAS NOTIFICACIONES<========= */
/*-------------------------------------------------*/
$router->get('/notifications', ['uses'=>'Notification@showNotification']);
$router->post('/notifications', ['uses'=>'Notification@createNotification']);