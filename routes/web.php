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

// Route::get('/index', 'MainController@index')->middleware('auth');
Route::get('/index', 'MainController@index')->middleware('auth');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::post('/login/attemp', 'Auth\LoginController@authenticate')->name('attempLogin');
Route::get('login', 'Auth\LoginController@index')->name('loginPage');
Route::get('/', function () {
    return view('welcome');
});