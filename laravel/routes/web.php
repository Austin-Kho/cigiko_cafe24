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

// Route::get('posts', function () {
//   return 'Test message';
// });

Route::get('posts/{postId?}', function ($postId = 1) {
  return 'Post ID: '. $postId;
})->name('posts');

Route::get('test', 'TestController@test')->name('test');

Route::get('posts/{postId}/comments/{commentId}', function($postId = 1, $commentId){
  return 'Post ID: '. $postId. ', Comment ID: '.$commentId;
});

Route::get('dashboard', function(){
  return 'Dashboard';
})->middleware('auth');
