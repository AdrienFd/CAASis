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
* Image routes
*
*/

Route::get('add', function () { return view('images.create'); })->name('add');
Route::post('add', 'ImageController@store')->name('addImage');



/*
*
* Navigation routes
*
*/
Route::get('Accueil', function () { return view('home'); })->name('home');

Route::get('Mentions légales', function () { return view('mention'); })->name('mention');

//Ideas routes
Route::get('Idées', 'MVC\IdeaController@getIdeas')->name('ideas');
Route::post('Idées/Vote', "MVC\IdeaController@Vote")->name('vote');
Route::post('Idées/Add', "MVC\IdeaController@Add")->name('addIdea');
Route::post('Idées/Transform', "MVC\IdeaController@Transform")->name('moveToEvent');


//Events routes
Route::get('Évenements', 'MVC\EventController@getEvents') -> name('events');
Route::post('Évenements/Participe', "MVC\EventController@Participate")->name('participate');
Route::post('Évenements/Add', 'MVC\EventController@Add') -> name('addEvent');
Route::post('Évenements/Approbate', 'MVC\EventController@Approbate') -> name('approbateEvent');
Route::get('Évenement/{id}/{name}', 'MVC\EventController@getEvent') -> name('event');

//Shop routes
Route::get('Boutique', 'MVC\ShopController@getArticles')->name('shop');
Route::post('Boutique', 'MVC\ShopController@getArticles')->name('shop');
Route::post('Boutique/AddArticle', 'MVC\ShopController@AddArticle')->name('addArticle');
Route::post('Boutique/DelArticle', 'MVC\ShopController@DelArticle')->name('delArticle');
Route::post('Boutique/AddToCart', 'MVC\ShopController@AddArticle')->name('addToCart');
Route::post('Boutique/DelFromCart', 'MVC\ShopController@DelArticle')->name('delFromCart');
Route::get('Boutique/{id}/{name}', 'MVC\ShopController@getArticle') -> name('article');



Route::get('/', function () { return view('home'); });

/*
*
* Testing routes
*
*/

Route::get('test', function () {
    return view('test');
});