<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');


Route::resource('users', 'UserController');

Route::resource('propertyCategories', 'PropertyCategoryController');

Route::resource('properties', 'PropertyController');

Route::resource('images', 'ImageController');

Route::resource('propertyCategories', 'PropertyCategoryController');

Route::resource('sliders', 'SliderController');

Route::resource('conditions', 'ConditionController');


Route::post('/save-token', 'NotificationWebController@saveToken')->name('save-token');
Route::post('/send-notification', 'NotificationWebController@sendNotification')->name('send.notification');

Route::resource('cities', 'CityController');

Route::resource('districts', 'DistrictController');

Route::resource('settings', 'SettingController');

Route::resource('bakeries', 'BakeryController');

Route::resource('drivers', 'DriverController');

Route::resource('orders', 'OrderController');