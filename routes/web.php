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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/outOfBound', 'HomeController@fail')->name('outOfBound');
Route::resource('admin',AdminController::class)->middleware('role:admin');
Route::resource('customer',CustomerController::class,['only'=>'index'])->middleware('role:customer,employee');
Route::resource('employee','EmployeeController',['only'=>'index'])->middleware('role:employee,admin');
Route::resource('employee',EmployeeController::class,['except'=>'index'])->middleware('role:admin');
Route::resource('product',ProductController::class)->middleware('role:admin');
Route::resource('order',OrderController::class,['only'=>['index','show']])->middleware('role:admin,employee,customer');
Route::resource('orderDetails',OrderDetailController::class);
Route::get('/Menu',[\App\Http\Controllers\CustomerController::class,'menu'])->name('Menu')->middleware('role:customer');
Route::get('/addOrder',[\App\Http\Controllers\OrderController::class,'store'])->name('addOrder')->middleware('role:customer');
Route::get('/addOrderDetails',[\App\Http\Controllers\OrderDetailController::class,'store'])->name('addOrderDetails')->middleware('role:customer');

