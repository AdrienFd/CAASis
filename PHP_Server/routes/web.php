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

Route::get('/idea', function () {
    return view('idea');
});



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

Route::get('/home', function () {
    return view('home');
});
//'HomeController@index')->name('home');

Route::get('logout', 'Auth\LoginController@logout');

Route::get('register', 'MVC\Register@getLocation')->name('register');

Route::get('login', function () {
    return view('auth.login');
})->name('login');

Route::get('/test', function () {
    return view('test');
});

Route::get('/index', function () {
    return view('home');
});

Route::get('/', function () {
    return view('home');
});