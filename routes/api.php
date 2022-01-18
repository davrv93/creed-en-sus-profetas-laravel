<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('test', 'TestController@index');
Route::get('believe/book_languages', 'BelieveController@index');
Route::get('believe/chapters', 'ChapterController@index');
Route::get('believe/verses', 'VerseController@index');
Route::get('believe/spirit_prophecy_chapter', 'SpiritProphecyController@index');


Route::get('files/lectura.pdf', function () {
    return response()->file('var/www/html/public/files/lectura.pdf');
});
