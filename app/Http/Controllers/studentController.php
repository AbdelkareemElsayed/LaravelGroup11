<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\student;

class studentController extends Controller
{
    //


     public function index(){
         // code .....

        $data =  student :: orderBy('id','desc')->get();

        //->take(2)

         return view('students.index',["data" => $data]);
     }




    public function create(){
        return view('students.create');
       }


       public function Store(Request $request){
           // code .....

       $data =  $this->validate($request,[
               "name"     => "required|min:3",
               "email"    => "required|email",
               "password" => "required|min:6"
        ]);

       //  student::create(["name" => $request->name , "email" => $request->email , "password" => $request->password]);

       $data['password'] = bcrypt($data['password']);

       $op = student :: create($data);

        if($op){
            echo 'data inserted';
        }else{
            echo 'error try again';
        }



       }



}
