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
    //return view('welcome');
    return redirect('dashboard');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('dashboard','ProductController@index')->name('dashboard');
Route::get('uploadfile','ProductController@uploadfile')->name('uploadform');
Route::post('uploadfile','ProductController@uploadFilePost');
Route::get('/product/detail/{id}','ProductController@detail')->name('detail');


