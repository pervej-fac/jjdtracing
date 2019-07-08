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

Route::get('/', 'LoginController@loginForm')->name('user.login.form');
Route::post('login', 'LoginController@login')->name('user.login');
Route::get('dashboard','DashboardController@index')->name('dashboard');



