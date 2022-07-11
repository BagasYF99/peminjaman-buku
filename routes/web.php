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
// Route::get('/dipinjam', 'UserController@dipinjam')->middleware('auth');

// admin_crud
Route::delete('/buku/delete/{id}', 'BookController@destroy')->middleware('auth');
Route::post('/buku/edit/{id}', 'BookController@update')->middleware('auth');
Route::post('/buku/store', 'BookController@store')->middleware('auth');
Route::get('/book', 'BookController@index')->middleware('auth');
// admin_crud_end
//report_
Route::get('/user/peminjam', 'MainController@daftarPeminjam')->middleware('auth');
Route::get('/buku/semua', 'MainController@indexSemuaBuku')->middleware('auth');
//report_end

// pengembalian_
Route::post('/pengembalian/buku/update/{id}', 'PengembalianController@update')->middleware('auth');
// pengembalian_end

Route::post('/pinjam/buku/{id}', 'MainController@bookOut')->middleware('auth');
Route::get('/terpinjam', 'PengembalianController@index')->middleware('auth');
Route::get('/index', 'MainController@index');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::post('/login/attemp', 'Auth\LoginController@authenticate')->name('attempLogin');
Route::get('login', 'Auth\LoginController@index')->name('login')->middleware('guest');;
Route::get('/', function () {
    return view('welcome');
});
