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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('indamobil','MobileController@ind_a_mobile');
Route::get('showamob','MobileController@show_a_mobile');
Route::get('indcomob','MobileController@index_c_mobile');
Route::get('homobile','MobileController@hoy_mobile');
Route::get('mandex','MobileController@mantencion_indx');


Route::post('mansmob','MobileController@mnt_s_mobile');

Route::post('elimamob/{id}','MobileController@elim_a_mobile');
Route::post('apramob/{id}','MobileController@apr_a_mobile');

