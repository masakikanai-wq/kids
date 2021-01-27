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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'KidController@index')->name('index');

// 新規登録ページ表示
Route::get('/post/add', 'KidController@add')->name('post_add');

// 新規登録
Route::post('/post/add', 'KidController@create')->name('post_create');

// 投稿詳細画面を表示
Route::get('/kids/{id}', 'KidController@show')->name('post_show');

// 投稿編集
Route::get('/kids/edit/{id}', 'KidController@edit')->name('post_edit');

// 投稿更新
Route::put('/kids/update/{id}', 'KidController@update')->name('post_update');

// 投稿削除
Route::DELETE('/kids/destroy/{id}', 'KidController@destroy')->name('post_destroy');