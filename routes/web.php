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
    return view('welcome');
});

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Email Verification Routes...

Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('person', [
    'uses' => 'Web\PeopleController@index',
    'as' => 'person.index'
]);

Route::get('person/{person}', [
    'uses' => 'Web\PeopleController@show',
    'as' => 'person.show'
]);

Route::get('movies', [
    'uses' => 'Web\MoviesController@index',
    'as' => 'movies.index'
]);

Route::get('movies/{movie}', [
    'uses' => 'Web\MoviesController@show',
    'as' => 'movies.show'
]);

//Person on movie
Route::get('movie-casting/{movie}', [
    'uses' => 'Web\PersonOnMoviesFrontController@getCasting',
    'as' => 'movie_casting.getCasting'
]);

Route::get('movie-directors/{movie}', [
    'uses' => 'Web\PersonOnMoviesFrontController@getDirectors',
    'as' => 'movie_directors.getDirectors'
]);

Route::get('movie-producer/{movie}', [
    'uses' => 'Web\PersonOnMoviesFrontController@getProducer',
    'as' => 'movie_producer.getProducer'
]);

//Movie on Person

Route::get('movies-as-actor/{person}', [
    'uses' => 'Web\MoviesOnPersonFrontController@getMoviesAsActor',
    'as' => 'person.movies_as_actor'
]);

Route::get('movies-as-director/{person}', [
    'uses' => 'Web\MoviesOnPersonFrontController@getMoviesAsDirector',
    'as' => 'person.movies_as_director'
]);

Route::get('movies-as-producer/{person}', [
    'uses' => 'Web\MoviesOnPersonFrontController@getMoviesAsProducer',
    'as' => 'person.movies_as_producer'
]);
