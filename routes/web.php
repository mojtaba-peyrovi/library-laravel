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
// Route::get('/books', 'booksController@index')->name('books-index');
// Route::get('/books/{book}', 'booksController@show')->name('books-show');
// Route::get('/books/{book}/edit', 'booksController@edit')->name('books-edit');
// Route::get('/book/create', 'booksController@create');
// Route::post('/books', 'booksController@store');
// Route::put('/books/{book}', 'booksController@update');
Route::resource('books', 'booksController');
Route::Post('books/create/bulk', 'booksController@uploadBulk');
Route::resource('authors', 'AuthorsController');

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/authors', 'AuthorsController@index')->name('authors-index');
// Route::get('/authors/{author}', 'AuthorsController@show')->name('authors-show');
// Route::get('/author/create', 'AuthorsController@create')->name('authors-create');
// Route::post('/authors', 'AuthorsController@store');

Route::get('/types', 'TypeController@index');
Route::get('/type/create', 'TypeController@create');
Route::post('/types', 'TypeController@store');
Auth::routes();
Route::get('/test',function(){
    return view('test');
});
