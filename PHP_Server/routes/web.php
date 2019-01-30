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

Route::get('Inscription', 'MVC\RegisterController@getLocation')->name('register');
Route::post('Inscription', 'Auth\RegisterController@register')->name('subscribe');

Route::get('/user/activation/{token}', 'Auth\LoginController@userActivation');

Route::get('Déconnexion', 'Auth\LoginController@logout')->name('logout');;

Route::get('Changé le mot de passe', function () { return view('auth.passwords.change'); });
Route::post('Changé le mot de passe', 'Auth\ResetPasswordController@changePassword')->name('changePSW');

Route::get('Mot de passe oublié', function () { return view('auth.passwords.reset'); });
Route::post('Mot de passe oublié', 'Auth\ForgotPasswordController@resetPassword')->name('resetPSW');

Route::post('Ajout membres du BDE', 'MVC\PromoteController@addMember')->name('addMember');
Route::post('Supression membres du BDE', 'MVC\PromoteController@removeMember')->name('removeMember');

/*
*
* Files routes (image upload, image dowload)
*
*/
Route::get('add', function () { return view('images.create'); })->name('add');
Route::post('add', 'FileController@store')->name('addImage');
Route::get('download/{id}/{name}', 'FileController@downloadAll')->name('download');

/*
*
* PDF routes (preview in view, generation from view)
*
*/
Route::get('Participate/{id}/{name}', 'PdfController@getParticipateList')->name('listParticipant');
Route::get('ParticipatePDF/{id}/{name}', 'PdfController@createPDF')->name('createPDF');


/*
*
* Navigation routes
*
*/
Route::get('Accueil', function () { return view('home'); })->name('home');
Route::get('Mentions légales', function () { return view('mention'); })->name('mention');
Route::get('Promotion Membres BDE', function () { return view('promote'); })->name('promote');

//Ideas routes
Route::get('Idées', 'MVC\IdeaController@getIdeas')->name('ideas');
Route::post('Idées/Vote', "MVC\IdeaController@Vote")->name('vote');
Route::post('Idées/Add', "MVC\IdeaController@Add")->name('addIdea');
Route::post('Idées/Transform', "MVC\IdeaController@Transform")->name('moveToEvent');

//Events routes
Route::get('Évenements', 'MVC\EventController@getEvents') -> name('events');
Route::post('Évenements/Add', 'MVC\EventController@Add') -> name('addEvent');
Route::post('Évenements/Participe', "MVC\EventController@Participate")->name('participate');
Route::post('Évenements/Approbate', 'MVC\EventController@Approbate') -> name('approbateEvent');
Route::get('Évenement/{id}/{name}', 'MVC\EventController@getEvent') -> name('event');
//   ||
//   || Images routes sub-part of event
//   \/
    Route::post('like', 'MVC\ImageController@like')->name('like');

//Shop routes
Route::get('Boutique', 'MVC\ShopController@getArticles')->name('shop');
Route::post('Boutique', 'MVC\ShopController@getArticles')->name('shop');
Route::post('Boutique/AddArticle', 'MVC\ShopController@AddArticle')->name('addArticle');
Route::post('Boutique/DelArticle', 'MVC\ShopController@DelArticle')->name('delArticle');
Route::post('Boutique/AddToCart', 'MVC\ShopController@buyArticle')->name('addToCart');
Route::post('Boutique/DelFromCart', 'MVC\ShopController@removeArticle')->name('delFromCart');
Route::get('Boutique/{id}/{name}', 'MVC\ShopController@getArticle') -> name('article');

/*
*
* Testing routes
*
*/
Route::get('test', function () {
    return view('test');
});

/*
*
* Wildcard routes
*
*/
Route::get('/', function () { return view('home'); });

