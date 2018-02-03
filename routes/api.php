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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('results', 'HistoryController@index');
Route::get('results/lastest', 'HistoryController@lastest');

// Route::get('results/{result}', 'HistoryController@show');

Route::post('save', 'HistoryController@store');

// Route::put('results/{result}', 'HistoryController@update');

// Route::delete('results/{result}', 'HistoryController@delete');