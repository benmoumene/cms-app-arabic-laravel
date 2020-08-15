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

Route::get('/','WelcomeControler@index')->name('welcome');
Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['middleware' => ['auth'],'prefix' => 'adminPanel', 'namespace' => 'admin'], function() {
    Route::get('/','AdminController@index')->name('adminPanel');
    //category
    Route::get('/category','CategoryController@index')->name('admin.category.index');
    Route::get('/category/create','CategoryController@create')->name('admin.category.create');
    Route::post('category/create','CategoryController@store')->name('admin.category.store');
    Route::delete('category/delete/{id}','CategoryController@destroy')->name('admin.category.delete');
    //news
    Route::get('/news','NewsController@index')->name('admin.news.index');
    Route::get('/news/create','NewsController@create')->name('admin.news.create');
    Route::get('/news/edit/{id}','NewsController@edit')->name('admin.news.edit');
    Route::get('/news/update/{id}','NewsController@update')->name('admin.news.update');
    Route::post('news/create','NewsController@store')->name('admin.news.store');
    Route::delete('news/delete/{id}','NewsController@destroy')->name('admin.news.delete');
    Route::get('news/search','NewsController@search')->name('search');
    //urgent_new
    Route::get('/news_urgent','UrgentNewsController@index')->name('admin.news_urgent.index');
    Route::get('/news_urgent/create','UrgentNewsController@create')->name('admin.news_urgent.create');
    Route::post('news_urgent/create','UrgentNewsController@store')->name('admin.news_urgent.store');
    Route::get('/news_urgent/edit/{id}','UrgentNewsController@edit')->name('admin.news_urgent.edit');
    Route::get('/news_urgent/update/{id}','UrgentNewsController@update')->name('admin.news_urgent.update');
    Route::delete('/news_urgent/delete/{id}','UrgentNewsController@destroy')->name('admin.news_urgent.delete');

    
    //draft
    Route::get('/draft','DraftController@index')->name('admin.draft.index');
    Route::get('/draft/edit/{id}','DraftController@edit')->name('admin.draft.edit');
    Route::put('/draft/update/{id}','DraftController@update')->name('admin.draft.update');
    Route::delete('draft/delete/{id}','DraftController@destroy')->name('admin.draft.delete');

    Route::group(['middleware' => ['auth','isAdmin::admin']], function() {
        //user
        Route::get('/user','UserController@index')->name('admin.allUser');
        Route::get('user/create','UserController@create')->name('admin.addUser');
        Route::post('user/create','UserController@store')->name('admin.storeUser');;
        Route::delete('user/delete/{id}','UserController@destroy')->name('admin.deleteUser');
        //ads
        Route::get('/ads','AdvertismentController@index')->name('admin.advertisment.index');
        Route::get('ads/create','AdvertismentController@create')->name('admin.advertisment.create');
        Route::post('ads/create','AdvertismentController@store')->name('admin.advertisment.store');
        Route::delete('ads/delete/{id}','AdvertismentController@destroy')->name('admin.advertisment.delete');
    });
});

Route::get('/home', 'HomeController@index')->name('home');
