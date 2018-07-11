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
Route::get('/books', 'booksController@index')->name('books-index');
Route::get('/books/{book}', 'booksController@show')->name('books-show');
Route::get('/book/create', 'booksController@create');
Route::post('/books', 'booksController@store');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/authors', 'AuthorsController@index')->name('authors-index');
Route::get('/authors/{author}', 'AuthorsController@show')->name('authors-show');
Auth::routes();