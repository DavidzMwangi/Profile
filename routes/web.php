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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('master',function (){

   return view('backend.profile');
});
Route::group(['middleware'=>'auth','namespace'=>'Backend','prefix'=>'backend','as'=>'backend.'],function (){

   Route::get('profile','ProfileController')->name('profile');
   Route::post('update_user_data_1','ProfileController@updateUser1')->name('update_user_data_1');
   Route::post('update_user_data_2','ProfileController@updateUser2')->name('update_user_data_2');
   Route::post('update_user_picture','ProfileController@updateUserPicture')->name('update_user_picture');
});