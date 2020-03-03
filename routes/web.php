<?php

use Illuminate\Support\Facades\Route;

/**
 * Affiche la vue bienvenue
 */
Route::get('/', function () {
    return view('application');
});

/**
 * Affiche la vue de l'utilisateur avec paramètre passé dans l´ URL
 */
Route::get('/user/{nom?}', function ($nom = "[ no data passed to represent as user ;) ]") {
    return view('user', [ "anarana" => $nom]);
});

/**
 * 1. Une autre type de routing par un controller
 */
// Route::get('/edevy', 'Edevy@index');

/**
 * 2. Afaka asiana parameter ihany koa izay nalaina tany @ URL
 */
Route::get('/edevy/{param?}', 'Edevy@index');

/**
 * Mampiasa view rehefa mampiseho ilay formulaire
 */
//Route::view('/formulaire', 'form');

/**
 * Mampiasa controllerur rehefa eto isika
 */
Route::get('/formulaire', 'Edevy@showForm');

/**
 * Alefa mankany @ controller miaraka @ methode post ilay données
 */
Route::post('/formulaire/formulairefoana/lavaloatra', 'Edevy@formSubmit')->name("barea");

/**
 * 
 * ajax routes
 * 
 * TODO
 */
Route::get('ajax-form-submit', 'FormController@index');
Route::post('save-form', 'FormController@store')->name("saveform");


/**
 * affiche form
 */
// Route::get('form', function(){
//     return view('from');
// });

Route::get('/showform', 'BynanController@afficherForm');

/**
 * traiter les données
 */

Route::post('/posting', 'BynanController@store')->name("barea");