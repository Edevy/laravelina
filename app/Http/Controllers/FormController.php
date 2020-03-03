<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    public function index()
    {
        return view('ajax-form');
    }       
 
    public function store(Request $request)
    {  
        $rules = array(
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'mobile_number' => 'required'
        );

        $validate = Validator::make($request->all(), $rules);

        if($validate->fails()){
            return response()->json([
                'warning'=>$validate->errors()
            ]);
        }

        $datas = [
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile_number'=>$request->mobile_number,
        ];

        try {
            Contact::create($datas);
            return response()->json([
                'success'=>[
                    'status'=>'success',
                    'message'=>'Data added with status success'
                ]
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error'=>$th->getMessage()
            ]);
        }

        // dd("ok");
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
