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

Route::get('/home', 'HomeController@index');

Route::prefix('admin')->middleware(['auth'])->namespace('Admin')->group(function () {
    Route::post('/admin/category/change_status_by_ids', 'CategoryController@changeStatusByIds');
    Route::resource('category', 'CategoryController');
    Route::resource('picture', 'PictureController');
});