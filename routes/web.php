<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function(){
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function(){
    //admin Home Page
    Route::get('/adminHome', 'Backend\categoryController@index')->name('admin.home');

    //admin create Category
    Route::get('/createCategory', 'Backend\categoryController@create')->name('admin.create');
    Route::post('/createCategory', 'Backend\categoryController@store')->name('admin.store');

    // Show Edit Page and Update after Submit
    Route::get('/editCategory/{category:slug}', 'Backend\categoryController@edit')->name('edit.Category');
    Route::post('/editCategory/{category:slug}', 'Backend\categoryController@update')->name('update.Category');

    Route::post('/deleteCategory/{category:slug}', 'Backend\categoryController@destroy')->name('delete.Category');  
    
    //News Home Page
    Route::get('/news', 'Backend\newsController@index')->name('news.home');

    //News Create Page
    Route::get('/createNews', 'Backend\newsController@create')->name('news.create');
    Route::post('/createNews', 'Backend\newsController@store')->name('news.store');

    // News Edit Page
    Route::get('/editNews/{news:slug}', 'Backend\newsController@edit')->name('news.edit');
    Route::post('/editNews/{news:slug}', 'Backend\newsController@update')->name('news.update');
    //News Delete Page
    Route::post('/deleteNews/{news:slug}', 'Backend\newsController@destroy')->name('news.delete');  


    


	
});