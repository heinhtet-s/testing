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
Route::group(['middleware'=> ['auth']],function(){
 Route::get('/logout','Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/blog','HomesController@index')->name('homes');
Route::get('/contact_page','HomesController@contact_page')->name('Home_contact');
Route::get('/user_profile','HomesController@user_profile')->name('user_profile');

Route::post('/insert-new','HomesController@insert');
Route::post('/user_contact','HomesController@user_contact')->name('user_contact');
Route::get('/look_new_info/{id}','HomesController@look_new_info');
Route::get('/delete_new/{id}','HomesController@delete_new')->middleware('PremiumCheck');
Route::post('/update_new','HomesController@update_new')->name('update_new')->middleware('PremiumCheck');
Route::post('/update_account','HomesController@update_account');
Route::post('/user_change_password','HomesController@user_change_password');
Route::group(['middleware'=>['CheckAdmin']],function(){
Route::get('/contact_delete/{id}','AdminController@contact_delete');
Route::get('/delete_user_info/{id}','AdminController@delete_user_info');
Route::get('/update_user_info/{id}','AdminController@updata_user_info');
Route::post('/update_premium_user','AdminController@update_premium_user');
Route::post('/update_admin','AdminController@update_admin_profile')->name('update_admin');
Route::post('/update_admin_password','AdminController@update_admin_password');
Route::get('/admin_page','AdminController@index')->name('admin_page');
Route::get('/admin_profile','AdminController@admin_profile')->name('admin_profile');
Route::get('/user_account','AdminController@user_account')->name('user_account');
Route::get('/contact_admin','AdminController@contact')->name('Admin_contact');
Route::get('/premium','AdminController@premium')->name('premium');
});
});
