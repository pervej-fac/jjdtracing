<?php
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Fragment\RoutableFragmentRenderer;

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
Route::middleware('auth')->group(function () {
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::resource('users', 'UsersController');
    Route::resource('employee', 'EmployeeController');
    Route::resource('department', 'DepartmentController');
    Route::resource('designation', 'DesignationController');
    Route::resource('page', 'PageController');
    Route::resource('day', 'DayController');
    Route::post('day/{id}','DayController@savePages')->name('daywisepage.save');


});

Route::get('logout',function(){
    auth()->logout();
    return redirect()->route('user.login.form');
});



