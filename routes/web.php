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

Route::get('/', 'HomeController@index')->name('guest.home');

Auth::routes();

Route::prefix('/admin')->name('admin.')->namespace('Admin')->middleware('auth')->group(function() {
  Route::get('/', 'HomeController@index')->name('index');
  Route::resource('members', 'MemberController');
  Route::get('members/{member}/confirmdestroy', 'MemberController@confirmdestroy')->name('members.confirmdestroy');
  Route::resource('activities', 'MemberActivityController');
  Route::get('activities/{activity}/confirmdestroy', 'MemberActivityController@confirmdestroy')->name('activities.confirmdestroy');
  Route::get('activities/{activity}/new', 'MemberActivityController@new')->name('activities.new');
  Route::post('activities/{activity}/stock', 'MemberActivityController@stock')->name('activities.stock');
});
