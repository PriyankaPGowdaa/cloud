<?php

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
     // return view('admin.dashboard');
    return view('adminLogin');
});
Route::get('getOrders','adminController@getOrders');
Route::get('downloadOrderDetail','adminController@downloadOrderDetail');
Route::get('getCompleteOrderDetail','adminController@getCompleteOrderDetail');
Route::get('getCategories','adminController@getCategories');
Route::get('getProducts','adminController@getProducts');
Route::get('getSchedules','adminController@getSchedules');
Route::get('getSliders','adminController@getSliders');
Route::get('getUsers','adminController@getUsers');
Route::get('adminDashboard','adminController@getAdminDashboard');
Route::get('ordersDetails','adminController@ordersDetails');
Route::get('getAddUser','adminController@getAddUser');
Route::get('getAddCategory','adminController@getAddCategory');
Route::get('getAddSlider','adminController@getAddSlider');
Route::get('getAddProduct','adminController@getAddProduct');
Route::get('getAddSchedule','adminController@getAddSchedule');
Route::get('getAdminLogin','adminController@getAdminLogin');
Route::get('getSignUp','adminController@getSignUp');
Route::get('adminLogout','adminController@adminLogout');
Route::get('getUserBalance','adminController@getUserBalance');
Route::get('getAddBalance','adminController@getAddBalance');
//---------------------------------------------
Route::post('updateOrder','adminController@updateOrder');
Route::post('updateCategoryFile','adminController@updateCategoryFile');
Route::post('updateProductFile','adminController@updateProductFile');
Route::post('updateSliderFile','adminController@updateSliderFile');
Route::post('updateUser','adminController@updateUser');
Route::post('updateSlider','adminController@updateSlider');
Route::post('updateProduct','adminController@updateProduct');
Route::post('updateCategory','adminController@updateCategory');
Route::post('updateSchedule','adminController@updateSchedule');
Route::post('updateBalance','adminController@updateBalance');
Route::post('deleteOrder','adminController@deleteOrder');
Route::post('deleteCategory','adminController@deleteCategory');
Route::post('deleteProduct','adminController@deleteProduct');
Route::post('deletePromotion','adminController@deletePromotion');
Route::post('deleteSlider','adminController@deleteSlider');
Route::post('deleteUser','adminController@deleteUser');
Route::post('deleteBalance','adminController@deleteBalance');
Route::post('registerStaff','adminController@registerStaff');
Route::post('authenticateAdmin','adminController@authenticateAdmin');
Route::post('addCategory','adminController@addCategory');
Route::post('addProduct','adminController@addProduct');
Route::post('addSlider','adminController@addSlider');
Route::post('addUser','adminController@addUser');
Route::post('addSchedule','adminController@addSchedule');
Route::post('addBalance','adminController@addBalance');
Route::post('updateItem','adminController@updateItem');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
