<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/Message',function (){

    echo 'Test Message From Laravel .... ';
});


// Route::get('/Profile',function (){
//     return view('profile');
// });

Route::view('/Profile','profile');

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
