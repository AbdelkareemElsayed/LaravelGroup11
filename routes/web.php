<?php

use App\Http\Controllers\blogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\studentController;

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



Route::middleware(['Lang'])->group(function(){

Route::get('/', function () {
    return view('welcome');
});


Route::get('/Message/{name}/{id?}',function ($val1,$val2 = null){

    echo 'welcome ,  '.$val1.'& id = '.$val2;
})->where([ 'name' => '[a-zA-Z]+' ]  );


// Route::get('/Profile',function (){
//     return view('profile');
// });

// Route::view('/Profile','profile');

//url?id=2030&email=

// Route::get('delete/{id}',function (){});
// delete.php?id=22
// delete/22


// Route::view('Create','create');
// Route::post('Store',function (){
//     echo 'Store Data';
// });


Route::get('Create',[userController::class,'create']);
Route::post('Store',[userController::class,'store']);
Route::get('Profile',[userController::class,'loadData']);


Route::view('Test','testSession');


Route::middleware(['checkLogin'])->group(function(){

# Student Routes .......
Route::get('Student/',[studentController::class,'index']);
Route::get('Student/Create',[studentController::class,'create']);
Route::post('Student/Store',[studentController::class,'Store']);
Route::get('Student/delete/{id}',[studentController::class,'delete']);
Route::get('Student/edit/{id}',[studentController::class,'edit']);
Route::put('Student/update/{id}',[studentController::class,'update']);
Route::get("Student/LogOut",[studentController::class,'LogOut']);

});

Route::get("Student/Login",[studentController::class,'login']);
Route::post("Student/doLogin",[studentController::class,'doLogin']);




# Blog .....
// Route::get('Blog/getData',[blogController::class,'fetchdata']);
Route::resource('Blog',blogController::class);





Route::get('Lang/{lang}', function ($lang){

    session()->put('lang',$lang);
    return back();
});

});

//    /Blog           GET    (index)     >>>>    Route::get('Blog',[BlogController::class,'index']);
//    /Blog/create    GET    (Create)    >>>>    Route::get('Blog/create',[BlogController::class,'create']);
//    /Blog           post   (Store)     >>>>    Route::post('Blog',[BlogController::class,'store']);
//    /Blog/{id}/edit GET    (Edit)      >>>>    Route::get('Blog/{id}/edit',[BlogController::class,'edit']);
//    /Blog/{id}      PUT    (update)    >>>>    Route::put('Blog/{id}',[BlogController::class,'update']);
//    /Blog/{id}      Delete (destroy)   >>>>    Route::delete('Blog/{id}',[BlogController::class,'destroy']);
//    /Blog/{id}      GET    (SHOW)      >>>>    Route::get('Blog/{id}',[BlogController::class,'show']);




/*
get
post
put
patch
delete
any
match
option
resource
......
*/
