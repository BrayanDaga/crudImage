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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/student', 'StudentController');

Route::get('/student/show/{id}', 'StudentController@show')->name('student.show');

Route::get('/student/edit/{id}', 'StudentController@edit')->name('student.edit');

Route::put('/student/edit/{id}', 'StudentController@update')->name('student.update');


Route::delete('/student/delete/{id}', 'StudentController@destroy')->name('student.delete');


