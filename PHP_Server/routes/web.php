<?php

use Illuminate\Support\Facades\Hash;
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

Auth::routes();

Route::get('/', function () {
    return view('index');
});

Route::get('/idea', function () {
    return view('idea');
});


Route::get('/index', function () {
    return view('index');
})->name('index');



Route::get('/event', function () {
    return view('event');
});

Route::get('/event_presentation', function () {
    return view('event_presentation');
});

Route::get('/shop', function () {
    return view('shop');
});

Route::get('/article_description', function () {
    return view('article_description');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/a', function() {
    return view('test');
});

Route::get('/logout', function() {
    return view('logout');
});

//Print the ideas
Route::get('/idea', 'Controller@getIdeas')->name('print_idea');

//Vote for an idea
Route::post('/vote', "Controller@Vote");