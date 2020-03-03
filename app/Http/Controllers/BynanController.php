<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BynanController extends Controller
{

    function afficherForm(){
        return view("form");
    }

    function store(){
        print_r("mandeha");
    }


    function delete(){
        // TO DO
    }
}
