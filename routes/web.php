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

//Front
Route::get('/', 'Front\HomeController@index');
Route::get('article_details/{article_id}', 'Front\HomeController@article_details')->name('article_details');
Route::post('add_comment', 'Front\HomeController@add_comment')->name('add_comment');



//Admin login 
Route::get('AdminLogin', 'Admin\AdminLoginController@login_form')->name('login');
Route::post('AdminLogin', 'Admin\AdminLoginController@submit_login')->name('AdminLogin');


//Admin controlpanel routes
Route::group(['middleware'=>'auth', 'namespace'=>'Admin', 'prefix'=>'Admin'], function(){
    
    Route::get('/logout', 'AdminController@logout')->name('AdminLogout');
    
    Route::get('/home', 'AdminController@dashboard')->name('home');
    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
    
    Route::resource('Articles', 'ArticlesController');
    Route::resource('Categories', 'CategoriesController');     
});

