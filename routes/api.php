<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('/product', function (){
    return "i am get";
});
Route::post('/product',function (){
    return "i am post";
});
Route::put('/product', function (){
    return "i am put";
});
Route::patch('/product', function (){
    return "i am patch";
});
Route::delete('/product', function (){
    return "i am delete";
});
