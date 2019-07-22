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


// メッセージリスト
Route::get('/messages', 'MessageController@index');
Route::get('/message/new', 'MessageController@create');;
Route::post('/message', 'MessageController@store');
Route::get('/message/edit/{id}', 'MessageController@edit');;
Route::post('/message/update/{id}', 'MessageController@update');


// ルートディレクトリ → メッセージリスト
Route::get('/', function () {
    return redirect('/messages');
});


// ユーザー認証
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
