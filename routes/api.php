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
Route::post('login','apiController@login');
Route::post('placeOrder','apiController@placeOrder');
Route::post('updateBalance','apiController@updateBalance');
Route::post('updateOrder','apiController@updateOrder');
Route::get('getProductDetails','apiController@getProductDetails');
Route::get('getUserDetails','apiController@getUserDetails');
Route::get('getSearchProducts','apiController@getSearchProducts');
Route::get('getSlider','apiController@getSlider');
Route::get('getAllProducts','apiController@getAllProducts');
Route::get('getPromotions','apiController@getPromotions');
Route::get('getProductImage','apiController@getProductImage');
Route::get('getAllCategories','apiController@getAllCategories');
Route::get('getHistoryDateTime','apiController@getHistoryDateTime');
Route::get('getHistoryDetails','apiController@getHistoryDetails');
Route::get('getCities','apiController@getCities');
Route::get('getCitySchedules','apiController@getCitySchedules');
Route::get('getOrders','apiController@getOrders');

 // Route::post('signUp','Controller@signUp');
 //   Route::post('logIn','Controller@logIn');
 //   Route::get('categories','Controller@categories');
 //   Route::get('foodListCategory','Controller@foodListCategory');
 //   Route::get('foodStock','Controller@foodStock');
 //   Route::post('insertOrder','Controller@insertOrder');
 //   Route::get('currentOrderList','Controller@currentOrderList');
 //   Route::get('allOrderList','Controller@allOrderList');
 //   Route::get('getTableToReserve','Controller@getTableToReserve');
 //   Route::post('reserveTable','Controller@reserveTable');