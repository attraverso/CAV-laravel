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
  Route::resource('activities', 'MemberActivityController');
  Route::get('members/{member}/confirmdestroy', 'MemberController@confirmdestroy')->name('members.confirmdestroy');
});
