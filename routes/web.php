<?php

use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', 'UserController@index');

Route::post('/upload', 'UserController@upload');

Auth::routes();


Route::get('/todos', 'TodoController@index')->name('todo.index');
Route::get('/todos/create', 'TodoController@create')->name('todo.create');
Route::get('/todos/{todo}/edit', 'TodoController@edit')->name('todo.edit');
Route::patch('/todos/{todo}/edit', 'TodoController@update')->name('todo.update');
Route::post('/todos/create', 'TodoController@store')->name('todo.store');
Route::put('/todos/{todo}/complete', 'TodoController@complete')->name('todo.complete');
Route::put('/todos/{todo}/incomplete', 'TodoController@incomplete')->name('todo.incomplete');
Route::put('/todos/{todo}/delete', 'TodoController@delete')->name('todo.delete');


Route::get('/home', 'HomeController@index')->name('home');
