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
//Route::post('/upload', 'UploadController@upload')->name('upload');

// Route::get('image/upload','UploadController@fileCreate');
Route::post('upload','UploadController@fileStore');
Route::post('file/delete','UploadController@fileDestroy');