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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('book' , function(){
    return view('book');
});

Route::get('book/{bookid}/{id?}', 'Book\BookController@index')->name('book');

Route::get('write', 'WriteController@index')->name('write');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*
|--------------------------------------------------------------------------
| laravel study
|--------------------------------------------------------------------------
|
|
*/

// with 로 view 에 데이터 바인딩
Route::get('abc', function(){
    $greeting = 'Hello';

    return view('index')->with('greeting', $greeting);
});

// with 로 하나 이상의 데이터 바운딩
Route::get('cde', function(){
    return view('index')->with([
        'greeting'=>'Good morning^^/',
        'name'    => 'Appkr'
    ]);
});

// 두번째 인자를 배열로 넘기는 방법
Route::get('efg', function(){
    return view('index', [
        'greeting' => 'Ola~',
        'name'     => 'Laravelians'
    ]);
});

// view 인스턴스의 Property 를 이용하는 방법
Route::get('ghi', function(){
    $view = view('index');
    $view->greeting = "Hey~ What's up";
    $view->name = 'everyone';

    return $view;
});

