<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/fasions','App\Http\Controllers\FasionController@index')->name('fasion.index');

Route::get('/fasions/create','App\Http\Controllers\FasionController@create')->name('fasion.create');
Route::post('/fasions/store/','App\Http\Controllers\FasionController@store')->name('fasion.store');

Route::get('/fasions/edit/{fasion}','App\Http\Controllers\FasionController@edit')->name('fasion.edit');
Route::put('/fasions/edit/{fasion}','App\Http\Controllers\FasionController@update')->name('fasion.update');

Route::get('/fasions/show/{fasion}','App\Http\Controllers\FasionController@show')->name('fasion.show');

Route::delete('/fasions/{fasion}','App\Http\Controllers\FasionController@destroy')->name('fasion.destroy');
