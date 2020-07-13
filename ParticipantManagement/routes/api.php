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

//header('Access-Control-Allow-Origin:  *');
//header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
//header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization'); 



Route::group(['middleware' => ['cors', 'json.response']], function () {

    Route::post('/register', 'API\AuthController@register')->name('reg');
    Route::post('/login', 'API\AuthController@login')->name('login');    
    Route::post('/logout', 'API\AuthController@logout')->name('logout');
    

});


Route::middleware('auth:api')->group( function () {
  Route::resource('tests', 'API\TestController');
});