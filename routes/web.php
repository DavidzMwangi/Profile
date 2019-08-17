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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend/index');
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

   //media
    Route::get('media','MediaController')->name('media');
    Route::post('save_new_media','MediaController@saveNewMedia')->name('save_new_media');
    Route::get('delete_media/{media}','MediaController@deleteMedia')->name('delete_media');

    //skills
    Route::get('skills','SkillsController')->name('skills');
    Route::post('save_new_skill','SkillsController@saveNewSkill')->name('save_new_skill');
    Route::get('delete_skill/{skill}','SkillsController@deleteSkill')->name('delete_skill');

    //education
    Route::get('education','EducationController')->name('education');
    Route::post('save_new_education','EducationController@saveNewEducation')->name('save_new_education');
    Route::get('delete_education/{education}','EducationController@deleteEducation')->name('delete_education');

    //service
    Route::get('service','ServiceController')->name('service');
    Route::post('save_new_service','ServiceController@saveNewService')->name('save_new_service');
    Route::get('delete_service/{service}','ServiceController@deleteService')->name('delete_service');

    //project
    Route::get('project','ProjectController')->name('project');
    Route::post('save_new_project','ProjectController@saveNewProject')->name('save_new_project');
    Route::get('delete_project/{project}','ProjectController@deleteProject')->name('delete_project');


});

