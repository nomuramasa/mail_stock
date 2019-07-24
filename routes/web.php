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


// ルートディレクトリ → メッセージリスト
Route::get('/', function () {
    return redirect('/messages');
});


// メッセージリスト
Route::get('/messages', 'MessageController@index')->name('message.list');

Route::get('/messages/new', 'MessageController@create')->name('message.new');
Route::post('/message', 'MessageController@store')->name('message.store');

Route::get('/message/edit/{id}', 'MessageController@edit')->name('message.edit');
Route::post('/message/update/{id}', 'MessageController@update')->name('message.update');

Route::get('/messages/mail_switch/{id}', 'MessageController@mail_switch')->name('message.mail_switch');

Route::delete('/message/{id}', 'MessageController@destroy')->name('message.delete');



// ユーザー認証
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
