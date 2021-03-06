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

// Route::resource('/pertanyaans', 'PertanyaanController');


Route::get('/pertanyaans', 'PertanyaanController@index');

Route::group(['middleware' => 'auth'], function () {
    //ini buat login
    Route::get('/pertanyaans/create', 'PertanyaanController@create');
    Route::post('/pertanyaans', 'PertanyaanController@store');
    Route::get('/pertanyaans/{pertanyaan}', 'PertanyaanController@show');
    Route::get('/pertanyaans/{pertanyaan}/edit', 'PertanyaanController@edit');
    Route::put('/pertanyaans/{pertanyaan}', 'PertanyaanController@update');
    Route::delete('/pertanyaans/{pertanyaan}', 'PertanyaanController@destroy');
    Route::get('/pertanyaans/{user}/{pertanyaan}/upvote', 'PertanyaanController@upvote');
    Route::get('/pertanyaans/{user}/{pertanyaan}/downvote', 'PertanyaanController@downvote');
});


Route::group(['middleware' => 'auth'], function () {
    Route::post('/upvote_pertanyaan', 'PertanyaanController@upvote');
    Route::post('/downvote_pertanyaan', 'PertanyaanController@downvote');
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('/upvote_jawaban', 'JawabanController@upvote');
    Route::post('/downvote_jawaban', 'JawabanController@downvote');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/jawabans/{id}', 'JawabanController@index');
    Route::post('/jawabans', 'JawabanController@create');
    Route::delete('/jawabans/{id}/{idPertanyaan}', 'JawabanController@destroy');
    Route::get('/jawabans/{id}/edit', 'JawabanController@edit');
    Route::put('/jawabans/{id}', 'JawabanController@update');
});


Route::get('/', function () {
    return redirect('/pertanyaans');
});

Route::get('/welcome', function () {
    return view('welcome2');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/', function () {
//     return redirect('pertanyaans');
// });

// WYSIWYG Editor
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
