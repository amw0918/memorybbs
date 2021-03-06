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

Route::get('/', 'Home\HomeController@home')->name('home');

Auth::routes();
Route::resource('users',"Home\UsersController");

Route::resource('topics', 'Home\TopicsController', ['only' => ['index',  'create', 'store', 'update', 'edit', 'destroy']]);

Route::resource('categories',"Home\CategoriesController",['only'=>['show']]);

Route::post('upload_image',"Home\TopicsController@uploadImage")->name('topics.upload_image');

Route::get('topics/{topic}/{slug?}',"Home\TopicsController@show")->name('topics.show');
Route::resource('replies', 'RepliesController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);

Route::resource('notifications',"Home\NotificationsController",['only'=>['index']]);

