<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// importing dummyApi
// use App\Http\Controllers\dummyAPI;
// import DeviceController
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\DeviceController1;
use  App\Http\Controllers\MemberController;

use App\Http\Controllers\FileController;



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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Route for our fist dummy api
Route::get("data",[dummyAPI::class,'getData']);

// Route for our second Device api
Route::get("list/{id?}",[DeviceController::class,'list']);

// route for third Device api
Route::post("add",[DeviceController1::class,'add']);

// route for put method
Route::put("update",[DeviceController::class,'update']);


// route for search method
Route::get("search/{name}",[DeviceController::class,'search']);


// route for delete method
Route::delete("delete/{id}",[DeviceController::class,"delete"]);


// route for api validation
Route::post("save",[DeviceController::class,"save"]);

// one route for resource controller
Route::apiResource("member",MemberController::class);

// path for file upload
Route::post("upload",[FileController::class,'upload']);
