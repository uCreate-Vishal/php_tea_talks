<?php

use Illuminate\Http\Request;

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
Route::middleware('api')->get('/', 'ApiController@index');

Route::middleware('api')->post('/show', 'ApiController@showKeyword');

Route::middleware('api')->get('/show-api-exception', 'ApiController@showCustomException');
