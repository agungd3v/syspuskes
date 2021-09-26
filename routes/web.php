<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
  return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'dashboard'], function() {
  Route::get('/', function() {
    return view('dashboard.admin.index');
  });
  Route::group(['prefix' => 'obat'], function() {
    Route::get('/keluar', 'ObatController@obatkeluar')->name('obat.keluar.index');
    Route::post('/keluar', 'ObatController@obatkeluarstore')->name('obat.keluar.store');
    Route::post('/keluar/delete/{id}', 'ObatController@obatkeluardelete')->name('obat.keluar.delete');

    Route::get('/masuk', 'ObatController@obatmasuk')->name('obat.masuk.index');
    Route::post('/masuk', 'ObatController@obatmasukstore')->name('obat.masuk.store');
    Route::post('/masuk/delete/{id}', 'ObatController@obatmasukdelete')->name('obat.masuk.delete');

    Route::get('/', 'ObatController@index')->name('obat.index');
    Route::post('/', 'ObatController@store')->name('obat.store');
    Route::post('/{id}', 'ObatController@update')->name('obat.update');
    Route::post('/delete/{id}', 'ObatController@delete')->name('obat.delete');
  });
  Route::group(['prefix' => 'kategori'], function() {
    Route::get('/', 'KategoriController@index')->name('kategori.index');
    Route::post('/', 'KategoriController@store')->name('kategori.store');
    Route::post('/{id}', 'KategoriController@update')->name('kategori.update');
    Route::post('/delete/{id}', 'KategoriController@delete')->name('kategori.delete');
  });
});
