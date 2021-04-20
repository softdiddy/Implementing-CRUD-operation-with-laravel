<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

$router->get('/', function(){
	return response()->json('welcome to Employee Management API');
});


Route::post('/register','App\Http\Controllers\AuthController@registerAdmin');
Route::post('/login','App\Http\Controllers\AuthController@admin_login');

Route::post('/createemployee','App\Http\Controllers\ManageEmployee@create');
Route::post('/destroyemployee/{id}','App\Http\Controllers\ManageEmployee@destroy');
Route::put('/updateemployee/{id}/','App\Http\Controllers\ManageEmployee@update');
Route::put('/getallemployee','App\Http\Controllers\ManageEmployee@index');
Route::get('/getsingleemployee/{id}','App\Http\Controllers\ManageEmployee@show');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
