<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    //

    public function create(){
     return view('create');
    }

    public function store(Request $request){

    //   echo  $request->name;
    //   echo  $request->password;
   //    echo  $request->input('name');
        //  dd($request->all());
        // dd($request->only(['name','email']));
        // dd($request->except(['_token']));
        // dd($request->has('name1'));
        // dd($request->hasAny(['name1','email2']));
        // echo $request->ip();

        //  echo $request->path();
        // echo $request->url();
        // echo $request->fullUrl();
        // echo $request->method();
        //  dd($request->ismethod("post"));

    }


}
