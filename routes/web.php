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

Route::get('/', function () {
    return view('welcome');
});


Route::get('cep/api/believe/book_languages', 'BelieveController@index');
Route::get('cep/api/believe/chapters', 'ChapterController@index');
Route::get('cep/api/believe/verses', 'VerseController@index');
Route::get('cep/api/believe/spirit_prophecy_chapter', 'SpiritProphecyController@index');
Route::get('cep/api/believe/bible_reading', 'BelieveController@reading');
