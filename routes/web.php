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


Route::post('/upload', 'UserController@upload');

Auth::routes();

Route::resource('todo', 'TodoController');
Route::put('/todos/{todo}/complete', 'TodoController@complete')->name('todo.complete');
Route::put('/todos/{todo}/incomplete', 'TodoController@incomplete')->name('todo.incomplete');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
