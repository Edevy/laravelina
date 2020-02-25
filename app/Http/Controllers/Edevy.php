<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Edevy extends Controller
{
    /**
     * Notre belle première contrôleur
     */
    // function index(){
    //     echo "controller created successfully";
    // }

    /**
     * methode pour afficher le parameter dans l'URL
     * 
     * @param = param
     */
    //  function index($param){
    //      echo "controller created successfully with the param = ".$param;
    //  }

    /**
     * Afaka mandefa array ihany koa
     * 
     * @var = array
     */
    // function index($param){
    //     return [
    //         "parameter" => $param,
    //         "id" => 44,
    //         "name" => "Kotoarisoa",
    //         "email" => "arisoa@edevy.mg"
    //     ];
    // }

    /**
     * Mandefa retour any amina view
     * 
     * @view
     */
    function index(){
        return view(
            'user',
            [
                "name" => "Peter"
            ]
        );
    }

    /**
     * Submission des données et les afficher ensuite
     */
    function formSubmit(Request $req){
        //dd($req->email);
        print_r($req->input("email"));
    }


    /**
     * 
     * Afficher la page de formulaire via le controlleur
     */
    function showForm(){
        return view("form");
    }
}
