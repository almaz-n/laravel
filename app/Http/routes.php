<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['middleware' => 'web'], function() {
    Route::auth();
    Route::get('/', function () {
        if (DB::connection()->getDatabaseName()) {
            $data['message'] = 'Соединение установлено, продолжаем';
        } else {
            $data['message'] = 'Ошибка соединения с БД';
        }
        return view('home', $data);
    });

    Route::group(['middleware' => 'auth'], function () {

        Route::get('/home/', 'HomeController@index');
        // Категории
        Route::resource('categories', 'CategoriesController');
        Route::get('/categories/{id}/destroy/', 'CategoriesController@destroy');

        // Напитки
        Route::resource('drinks', 'DrinksController');
        Route::get('/drinks/{id}/destroy/', 'DrinksController@destroy');
        Route::get('/order/', 'DrinksController@order');

        // Поиск
        Route::resource('/search/', 'DrinksController@search');

        // Страны
        Route::resource('countries', 'CountriesController');
        Route::get('/countries/{id}/destroy/', 'CountriesController@destroy');

        // Книги
        Route::get('/books/search/', 'BooksController@search');
        Route::get('/books/{id}/cart/', 'BooksController@cart');
        Route::get('/books/{id}/order/', 'BooksController@order');
        Route::get('/books/{id}/image/', 'BooksController@image');
        Route::post('/books/{id}/saveimage/', 'BooksController@saveImage');
        Route::resource('books', 'BooksController');
        Route::get('/books/{id}/destroy/', 'BooksController@destroy');
        
     });
});
