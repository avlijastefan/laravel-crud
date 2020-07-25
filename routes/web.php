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

Route::get('/', 'PageController@index')->name('index');

/**
 * Books
 */
Route::get('/books', 'BookController@index')->name('book.index')->middleware('auth');
Route::post('/books/create', 'BookController@create')->name('book.submit');
Route::get('/books/create', 'BookController@showCreateForm')->name('book.create');
Route::get('/books/edit/{id}', 'BookController@showEditForm')->name('book.edit')->middleware('admin');
Route::put('/books/update', 'BookController@update')->name('book.update');
Route::delete('/books/delete', 'BookController@delete')->name('book.delete');

/**
 * Authors
 */
Route::get('/authors', 'AuthorController@index')->name('author.index');
Route::get('/authors/create', 'AuthorController@showCreateForm')->name('author.create');
Route::post('/authors/create', 'AuthorController@create')->name('author.submit');
Route::get('/authors/edit/{id}', 'AuthorController@showEditForm')->name('author.edit');
Route::put('/authors/update', 'AuthorController@update')->name('author.update');
Route::delete('/authors/delete', 'AuthorController@delete')->name('author.delete');

Route::post('/login', 'Auth\LoginController@login');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::post('/register', 'Auth\RegisterController@register');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
