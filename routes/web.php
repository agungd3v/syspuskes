<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
  return view('welcome');
});

Auth::routes([
  'register' => false
]);

Route::group(['prefix' => 'dashboard'], function() {
  Route::get('/', function() {
    if (Auth::user()) {
      if (Auth::user()->role == 'gudang') return redirect()->route('gudang.index');
      if (Auth::user()->role == 'apotik') return redirect()->route('apotik.index');
      else return abort(404);
    } else {
      return abort(404);
    }
  });
  Route::group(['prefix' => 'gudang', 'middleware' => 'authgudang'], function() {
    Route::get('/', function() { return view('dashboard.admin.index'); })->name('gudang.index');
    Route::group(['prefix' => 'sumbermasuk'], function() {
      Route::get('/', 'SumberController@sumbermasuk')->name('sumbermasuk.index');
      Route::post('/', 'SumberController@sumbermasukstore')->name('sumbermasuk.store');
      Route::post('/update/{id}', 'SumberController@sumbermasukupdate')->name('sumbermasuk.update');
      Route::post('/delete/{id}', 'SumberController@sumbermasukdelete')->name('sumbermasuk.delete');
    });
    Route::group(['prefix' => 'sumberkeluar'], function() {
      Route::get('/', 'SumberController@sumberkeluar')->name('sumberkeluar.index');
      Route::post('/', 'SumberController@sumberkeluarstore')->name('sumberkeluar.store');
      Route::post('/update/{id}', 'SumberController@sumberkeluarupdate')->name('sumberkeluar.update');
      Route::post('/delete/{id}', 'SumberController@sumberkeluardelete')->name('sumberkeluar.delete');
    });
    Route::group(['prefix' => 'obat'], function() {
      Route::get('/keluar', 'ObatController@obatkeluar')->name('obat.keluar.index');
      Route::post('/keluar', 'ObatController@obatkeluarstore')->name('obat.keluar.store');
      Route::post('/keluar/delete/{id}', 'ObatController@obatkeluardelete')->name('obat.keluar.delete');
  
      Route::get('/masuk', 'ObatController@obatmasuk')->name('obat.masuk.index');
      Route::post('/masuk', 'ObatController@obatmasukstore')->name('obat.masuk.store');
      Route::post('/masuk/delete/{id}', 'ObatController@obatmasukdelete')->name('obat.masuk.delete');
  
      Route::post('/masuk/report', 'ObatController@reportobatmasuk')->name('obat.masuk.report');
      Route::post('/keluar/report', 'ObatController@reportobatkeluar')->name('obat.keluar.report');
  
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
  Route::group(['prefix' => 'apotik', 'middleware' => 'authapotik'], function() {
    Route::get('/', function() { return view('dashboard.admin.index'); })->name('apotik.index');
    Route::get('/obat', 'ApotikController@entry')->name('apotik.entry');
    Route::post('/obat', 'ApotikController@store')->name('apotik.post');
    Route::get('/laporan', 'ApotikController@laporan')->name('apotik.laporan');
    Route::post('/laporan', 'ApotikController@report')->name('apotik.report');
  });
});
