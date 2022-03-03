<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\student;

class studentController extends Controller
{
    //


    public function index(){
        // code .....

       $data =  student :: orderBy('id','desc')->get();

        return response()->json(['data' => $data]);
    }



  public function store(Request $request){

      $data = $request->all();

       $validator =   Validator::make($data,
         [
            "name"     => "required|min:3",
            "email"    => "required|email",
            "password" => "required|min:6"
        ]);

        if($validator->fails()){
            return response()->json(["errors" => $validator->errors()]);
        }else{
      // code .....

      $data['password'] = bcrypt($data['password']);

      $op = student :: create($data);

       if($op){
           $message = 'data inserted';
       }else{
           $message =  'error try again';
       }

       return  response()->json(["message" => $message]);

        }

  }





  public function edit($id){

    // code
    $data = student :: find($id);

       return response()->json(['data' => $data]);
  }








  public function Update(Request $request,$id){



      $data = $request->all();

       $validator =   Validator::make($data,
         [
            "name"     => "required|min:3",
            "email"    => "required|email"
                ]);

        if($validator->fails()){
            return response()->json(["errors" => $validator->errors()]);
        }else{
      // code .....


      $op = student :: find($id)->update($data);

       if($op){
           $message = 'data updated';
       }else{
           $message =  'error try again';
       }

       return  response()->json(["message" => $message]);

        }

  }


    public function message(){
       // code .....
      $data =  'test Message';

       return response()->json(['Message' => $data ],200);
    }




    public function delete($id){
        // code .....

       $op =  student::find($id)->delete();
       if($op){
          $message = "Raw Removed";
       }else{
          $message = 'Error Try Again';
       }

       return response()->json(['Message' => $message ],200);

        }


}
