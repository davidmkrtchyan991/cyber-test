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

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::middleware(['checkAdmin'])->group(function () {
        Route::resource('/admin/books', 'BooksController');
        Route::get('/admin', 'BooksController@index');
        // Table seeder
        Route::get('/seed', 'HomeController@dbSeedBook');
    });
});

