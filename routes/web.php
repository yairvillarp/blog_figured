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

Route::get('/', function () { return view('layouts.welcome'); });

Route::prefix('admin')->group(function () {
    Auth::routes();
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    
    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('/articles', 'Admin\ArticlesController', [
        'names' => [
            'index' => 'Articles',
            'create' => 'Articles New',
            'store' => 'Articles Store',
            'edit' => 'Articles Edit',
            'update' => 'Articles Update',
            'destroy' => 'Articles Delete',
        ]
    ]);

    Route::resource('/categories', 'Admin\CategoriesController', [
        'names' => [
            'index' => 'Categories',
            'create' => 'Categories New',
            'store' => 'Categories Store',
            'edit' => 'Categories Edit',
            'update' => 'Categories Update',
            'destroy' => 'Categories Delete',
        ]
    ]);
});
