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

/*
*
* Authentification & account management routes
*
*/
Route::get('Connexion', function () { return view('auth.login'); })->name('login');
Route::post('Connexion', 'Auth\LoginController@authenticate')->name('authenticate');

Route::get('Inscription', 'MVC\Register@getLocation')->name('register');
Route::post('Inscription', 'Auth\RegisterController@register')->name('subscribe');

Route::get('/user/activation/{token}', 'Auth\LoginController@userActivation');

Route::get('Déconnexion', 'Auth\LoginController@logout')->name('logout');;

Route::get('Changé le mot de passe', function () { return view('auth.passwords.change'); });
Route::post('Changé le mot de passe', 'Auth\ResetPasswordController@changePassword')->name('changePSW');

Route::get('Mot de passe oublié', function () { return view('auth.passwords.reset'); });
Route::post('Mot de passe oublié', 'Auth\ForgotPasswordController@resetPassword')->name('resetPSW');


/*
*
* Navigation routes
*
*/
Route::get('Accueil', function () { return view('home'); })->name('home');

Route::get('Mentions légales', function () { return view('mention'); })->name('mention');

//Route::get('Idées', function () { return view('idea'); })->name('ideas');

//Route::get('évenements', function () { return view('event'); })->name('events');
//Route::get('évenements/{ page }', function ($page) { return view('event_presentation'); })->name('event/{ name }');

//ideas
Route::get('Idées', 'MVC\IdeaController@getIdeas')->name('ideas');
Route::post('Idées/Vote', "MVC\IdeaController@Vote")->name('vote');
Route::post('Idées/Add', "MVC\IdeaController@Add")->name('addIdea');
Route::post('Idées/Transform', "MVC\IdeaController@Transform")->name('moveToEvent');

//Print the articles
//Route::get('Boutique', 'MVC\ShopController@getArticles')->name('shop');
//Route::get('Article/{name}', function () { return view('article_description'); })->name('article/{name}');

//Print the events
Route::get('Evenements', 'MVC\EventController@getEvents') -> name('events');
Route::post('Evenements/Add', 'MVC\EventController@Add') -> name('addEvent');
Route::get('Evenement/{id}', 'MVC\EventController@getEvent') -> name('event');
Route::post('Evenement/Participate', "MVC\EventController@Vote")->name('vote');

Route::get('Boutique', 'MVC\ShopController@getArticles')->name('shop');
Route::post('Boutique', 'MVC\ShopController@getArticles')->name('shop');

Route::get('/', function () { return view('home'); });

/*
*
* Testing routes
*
*/

Route::get('test', function () {
    return view('test');
});