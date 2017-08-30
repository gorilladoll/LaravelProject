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

Route::get('/','Auth\LoginController@show');
//Route Login Controller Show Login Page;

Route::get('/signup','Auth\LoginController@showSignup');
//Route Login Controller Show Signup Page

Route::post('/signup_confirm','Auth\LoginController@signupConfirm');
//Route Login Controller Show Signup Confirm And Logined

Route::post('/login_confirm','Auth\LoginController@loginConfirm');
// Route::post('/login_confirm','LoginsController@storeLogin');
//Route Login Controller Confirm Login And Logined Or Unlogin

Route::get('/logout','Auth\LoginController@Logout');
//Route Login Controller Logout

Route::get('/mylab/create','MylabController@setAttribute');

Route::get('/mylab/create/myshop',"MylabController@createMyshop");

Route::get('/mylab/show','MylabController@show');

Route::get('/mylab/user/lab/{user_id}','MylabController@userShow');

Route::get('/mylab/seller/add/{userid}','MylabController@addFollow');

Route::get('/mylab/goods','BoardController@goods');

Route::get('/mylab/follow','BoardController@follow');

Route::get('/mylab/user/goods/{user_id}','BoardController@userGoods');

Route::get('/mylab/user/follow/{user_id}','BoardController@userFollow');

Route::post('/board/create','BoardController@create');

Route::post('/mylab/goods/add','MylabController@addGoods');


Route::get('/storage/image/{filename}',function($filename){
  $path = storage_path("app/images/{$filename}");
  if(!File::exists($path)){
    abort(404);
  }
  $file = File::get($path);
  // $type = File::mineType($path);
  $response = Response::make($file,200);
  // $response->header('Content-type',$file);

  return $response;
});
