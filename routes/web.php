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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['namespace'=>'Site', 'as'=>'site.'],function () {
    Route::get('/', 'SiteController@index')->name('index');
});

Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'as'=>'admin.', 'middleware'=>['auth', 'admin']], function () {
    Route::get('dashboard', 'AdminController@index')->name('dashboard');
    Route::resource('tag', 'TagController');

});

Route::group(['prefix'=>'author', 'namespace'=>'Author', 'as'=>'author.', 'middleware'=>['auth', 'author']], function () {
    Route::get('dashboard', 'AuthorController@index')->name('dashboard');

});

