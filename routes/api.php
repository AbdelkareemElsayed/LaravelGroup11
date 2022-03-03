<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\studentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('Create',[userController::class,'create']);

Route::get('Message',[studentController::class,'message']);

Route::get('Student',[studentController::class,'index']);
Route::post('Student/Store',[studentController::class,'store']);

Route::get('Student/Edit/{id}',[studentController::class,'edit']);
Route::put('Student/Update/{id}',[studentController::class,'Update']);
Route::delete('Student/delete/{id}',[studentController::class,'delete']);


// Apiresource    == resource
