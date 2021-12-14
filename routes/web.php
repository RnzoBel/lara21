<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ChangePasswordController;

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
//Route::get('/', 'HomeController@index')->name('home');
Route::get('/', 'Auth\LoginController@showLoginForm')->name('index');
Route::post('login', 'Auth\LoginController@login')->name('login');

Route::get('reset_password_without_token', 'AccountsController@validatePasswordRequest');
Route::post('reset_password_with_token', 'AccountsController@resetPassword');


Auth::routes();
Route::group(['middleware' => ['auth']], function() {
   
   Route::get('/home', 'HomeController@index')->name('home');
   Route::get('setTrabajaServyApp/{app}', 'HomeController@setTrabajaServyApp')->name('auth.setTrabajaServyApp');
   Route::get('setAppUsu/{app}', 'HomeController@setAppUsu')->name('auth.setAppUsu');
  
  
   Route::get('user/profile/', 'UsuWebController@show')->name('auth.profile');
   Route::get('user/change-password', 'Auth\ChangePasswordController@index');
   Route::post('user/change-password', 'Auth\ChangePasswordController@store')->name('change.password');
   
   Route::get('admin/phones/', 'HomeController@phones')->name('auth.profile');
   Route::get('show/apps/', 'HomeController@showsapp')->name('showapps');
   Route::get('shows/ordenanzas', 'HomeController@ordenanzas')->name('ordenanzas');
   Route::get('shows/boem', 'HomeController@boem')->name('boem');
   
   


});


Route::get('misaplicativos', 'HomeController@showapps')->name('showmyapps');


