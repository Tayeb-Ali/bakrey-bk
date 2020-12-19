<?php

use App\Models\City;
use App\Models\District;
use App\Models\Property;
use App\Models\PropertyCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');

//Route::resource('bakeries', function (Request $request) {
//    return $token = $request->all();
//    return $auth = User::where('api_token', $token)->first();
//})->middleware('auth_api');
Route::resource('bakeries', 'BakeryAPIController');
Route::put('reports', 'BakeryAPIController@reports');
//Route::resource('bakeries', 'BakeryAPIController')->middleware('auth_api');

Route::resource('drivers', 'DriverAPIController');

Route::resource('orders', 'OrderAPIController');
Route::get('bakery_orders/{bakeryId}', 'OrderAPIController@bakery_orders');
Route::get('last_order/{bakeryId}', 'OrderAPIController@last_order');
Route::get('search_order/{searchText}/{bakeryId}', 'OrderAPIController@search_order');

Route::get('home_bakery/{userId}', 'HomeAPIController@home_bakery');
Route::get('home_agent/{userId}', 'HomeAPIController@home_agent');

Route::resource('users', 'UserAPIController');