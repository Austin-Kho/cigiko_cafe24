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
    return view('py');
});

Route::get('book01/{id?}', 'Book\Book01Controller@index')->name('book01');

Route::get('book02/{id?}', 'Book\Book02Controller@index')->name('book02');

Route::get('write', 'WriteController@index')->name('write');
