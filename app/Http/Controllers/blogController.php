<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blog;

class blogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $data = blog::join('users', 'users.id', '=', 'blogs.user_id')->select('blogs.*', 'users.name as userName')->get();

        return view('blogs.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data =   $this->validate($request, [
            "title"   => "required|max:100",
            "content" => "required|max:5000",
            "image"   => "required|image|mimes:png,jpg"    // file    // regex:

        ]);

        $FinalName = time() . rand() . '.' . $request->image->extension();

        if ($request->image->move(public_path('blogImages'), $FinalName)) {


            $data['image'] = $FinalName;
            $data['user_id'] = auth()->user()->id;

            $op = blog::create($data);

            if ($op) {
                $message = 'data inserted';
            } else {
                $message =  'error try again';
            }
        } else {
            $message = "Error In Uploading File ,  Try Again ";
        }

        session()->flash('Message', $message);

        return redirect(url('/Blog'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = blog::find($id);

        return view('blogs.show', ['data' => $data]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $data = blog::find($id);

        return view('blogs.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $data =   $this->validate($request, [
            "title"   => "required|max:100",
            "content" => "required|max:5000",
            "image"   => "nullable|image|mimes:png,jpg"    // file    // regex:

        ]);

        #   Fetch Data
        $objData = blog::find($id);


        if ($request->hasFile('image')) {

            $FinalName = time() . rand() . '.' . $request->image->extension();

            if ($request->image->move(public_path('blogImages'), $FinalName)) {

                unlink(public_path('blogImages/' . $objData->image));
            }
        } else {
            $FinalName = $objData->image;
        }


        $data['image'] = $FinalName;

        # Update OP ...

        $op = blog::find($id)->update($data);

        // $op = blog::where('id',$id)->update($data);

        if ($op) {
            $message = 'Raw Updated';
        } else {
            $message =  'error try again';
        }

        session()->flash('Message', $message);

        return redirect(url('/Blog'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        # Fetch Data
        $data =  blog::find($id);

        $op =  blog::find($id)->delete();
        if ($op) {
            unlink(public_path('blogImages/' . $data->image));
            $message = "Raw Removed";
        } else {
            $message = "Error Try Again";
        }

        session()->flash('Message', $message);

        return redirect(url('/Blog'));
    }
}
