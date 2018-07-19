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

/*
|   //生成url
|   $url = route('profile');
|   // 生成重定向
|   return redirect()->route('profile');
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','IndexController@index');
Route::any('/login','LoginController@login');
// Route::get('/login','LoginController@login');
Route::get('/logout','LoginController@logout');
Route::get('/detail/{id}','GoodsController@detail')->where(['id'=>'[0-9]+']);
Route::get('/skill/{id}','GoodsController@skill')->where(['id'=>'[0-9]+']);
Route::get('/confirm_order','OrderController@orderStep1');