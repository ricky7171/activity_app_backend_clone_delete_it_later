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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/activities/search', 'ActivityController@search');

Route::get('/activities/getUsingMonthYear/{month}/{year}', 'ActivityController@getUsingMonthYear');

Route::post('/histories/search', 'HistoryController@search');

Route::get('/histories/getHistoryRange', 'HistoryController@getHistoryRange');

Route::post('/histories/bulkStore', 'HistoryController@bulkStore');


Route::resource('activities', 'ActivityController')->except([
    'create', 'show'
]);

Route::resource('histories', 'HistoryController')->except([
    'create', 'show'
]);