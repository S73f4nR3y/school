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
    return redirect()->route('groups.index');
});


Route::resource('groups', GroupController::class);
Route::get('groups/{group}/students', 'GroupController@showStudents')->name('groups.showStudents');

Route::resource('students', StudentController::class);

