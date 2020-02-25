<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        return view('ajax-form');
    }       
 
    public function store(Request $request)
    {  
        dd("ok");
        // request()->validate([
        // 'name' => 'required',
        // 'email' => 'required|email|unique:users',
        // 'mobile_number' => 'required|unique:users'
        // ]);
         
        // $data = $request->all();
        // $check = Contact::insert($data);
        // $arr = array('msg' => 'Something goes to wrong. Please try again later', 'status' => false);
        // if($check){ 
        // $arr = array('msg' => 'Successfully submit form using ajax', 'status' => true);
        // }
        // return Response()->json($arr);
       
    }
}
