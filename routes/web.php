<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Affiche la vue bienvenue
 */

Route::get('/', function () {
    return view('welcome');
});

/**
 * Affiche la vue de l'utilisateur avec paramètre passé dans l´ URL
 */

Route::get('/user/{nom?}', function ($nom = "[ no data passed to represent as user ;) ]") {
    return view('user', [ "anarana" => $nom]);
});

/**
 * Une autre type de routing par un controller
 */
Route::get('/edevy', 'Edevy@index');