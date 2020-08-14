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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return redirect()->route('employees.index');
    });
    Route::resource('employees', 'Employees\EmployeeController');
    Route::resource('positions', 'Positions\positionController');
    Route::get('get-employees', 'Employees\EmployeeController@getEmployees')->name('getEmployees');

});
