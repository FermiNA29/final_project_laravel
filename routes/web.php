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

// Route::get('/', function () {
//     return view('index');
// });

Route::resource('/pertanyaans', 'PertanyaanController');
Route::get('/jawabans/{id}', 'JawabanController@index');
Route::post('/jawabans', 'JawabanController@create');
Route::delete('/jawabans/{id}', 'JawabanController@destroy');
Route::get('/jawabans/{id}/edit', 'JawabanController@edit');
Route::put('/jawabans/{id}', 'JawabanController@update');

Route::get('/', function () {
    return view('index');
});

Route::get('/welcome', function () {
    return view('welcome2');
});


Route::group(['middleware'=>'auth'], function(){
    //ini buat login
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
