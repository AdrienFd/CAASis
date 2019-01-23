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
    return view('index');
});

Route::get('/index', function () {
    return view('index');
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

Route::get('/bonjour/{prenom}', function () {
    $prenom = request('prenom');
    return view('bonjour', [
        'prenom' => $prenom,
    ]);
});
