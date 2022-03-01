<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/Message/{name}/{id?}',function ($val1,$val2 = null){

    echo 'welcome ,  '.$val1.'& id = '.$val2;
})->where([ 'id' => '[0-9]+' , 'name' => '[a-zA-Z]+' ]  );


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


# Student Routes .......
Route::get('Student/',[studentController::class,'index']);
Route::get('Student/Create',[studentController::class,'create']);
Route::post('Student/Store',[studentController::class,'Store']);


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
