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
    flashMe()->success();
    return view('welcome');
});

Route::resource('sekolah', 'SekolahController');
Route::resource('guru', 'SguruController');
Route::get('sekolah/{$id}/edit', 'SekolahController@edit');
Route::get('sekolah/{$id}', 'SekolahController@show');
Route::get('sekolah/create', 'SekolahController@create');
Route::post('sekolah', 'SekolahController@store');
Route::get('sekolah/{$id}', 'SekolahController@destroy');
Route::delete('sekolahDeleteAll', 'SekolahController@deleteAll');
Route::patch('sekolah/{$id}', 'SekolahController@update');
Route::apiResource('sekolah', 'SekolahController');;
Route::get('export', 'SekolahController@export')->name('export');
Route::get('importExportView', 'SekolahController@importExportView');
Route::post('import', 'SekolahController@import')->name('import');
Route::get('/flash-me', function(){
    flashMe()->success();
    dd(session()->all());
    return redirect()->to('/');
  });

Auth::routes();

Route::get('/administrator', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/administrator', 'HomeController@index')->name('home');
