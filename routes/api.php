<?php

use Illuminate\Http\Request;

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

/* Routes Front */
Route::resource('front-persons', 'Front\PersonAccessController')->only(['show', 'index']);

Route::resource('front-movies', 'Front\MovieAccessController')->only(['show', 'index']);

Route::resource('persons', 'Person\PersonController')->except(['create', 'edit']);

Route::resource('movies', 'Movie\MovieController')->except(['create', 'edit']);

/****** Routes Back-office *******/

/* Routes For PersonOnMovieController */

Route::get('movie-casting/{movie}', [
    'uses' => 'Movie\PersonOnMovieController@getCasting',
    'as' => 'movie-casting.getCasting'
]);

Route::get('movie-directors/{movie}', [
    'uses' => 'Movie\PersonOnMovieController@getDirectors',
    'as' => 'movie-directors.getDirectors'
]);

Route::get('movie-producer/{movie}', [
    'uses' => 'Movie\PersonOnMovieController@getProducer',
    'as' => 'movie-producer.getProducer'
]);

Route::get('movie-casting-add/{movie}', [
    'uses' => 'Movie\PersonOnMovieController@addPersonCasting',
    'as' => 'movie-casting-add.addPersonCasting'
]);

Route::get('movie-directors-add/{movie}', [
    'uses' => 'Movie\PersonOnMovieController@addPersonDirectors',
    'as' => 'movie-directors-add.addPersonDirectors'
]);

Route::get('movie-producer-add/{movie}', [
    'uses' => 'Movie\PersonOnMovieController@addPersonProducer',
    'as' => 'movie-producer-add.addPersonProducer'
]);

Route::put('movie-casting-update/{movie}', [
    'uses' => 'Movie\PersonOnMovieController@updateCasting',
    'as' => 'movie-casting-add.updateCasting'
]);

Route::put('movie-directors-update/{movie}', [
    'uses' => 'Movie\PersonOnMovieController@updateDirectors',
    'as' => 'movie-directors-add.updateDirectors'
]);

Route::put('movie-producer-update/{movie}', [
    'uses' => 'Movie\PersonOnMovieController@updateProducer',
    'as' => 'movie-producer-add.updateProducer'
]);

/* Routes For MovieOnPersonController */

Route::get('movies-as-actor/{person}', [
    'uses' => 'Person\MovieOnPersonController@getMoviesAsActor',
    'as' => 'movies-as-actor.getMoviesAsActor'
]);

Route::get('movies-as-director/{person}', [
    'uses' => 'Person\MovieOnPersonController@getMoviesAsDirector',
    'as' => 'movies-as-director.getMovieAsDirector'
]);

Route::get('movies-as-producer/{person}', [
    'uses' => 'Person\MovieOnPersonController@getMoviesAsProducer',
    'as' => 'movies-as-producer.getMovieAsProducer'
]);

Route::get('add-movie-as-actor/{person}', [
    'uses' => 'Person\MovieOnPersonController@addMoviesAsActor',
    'as' => 'add-movie-as-actor.addMoviesAsActor'
]);

Route::get('add-movie-as-director/{person}', [
    'uses' => 'Person\MovieOnPersonController@addMoviesAsDirector',
    'as' => 'add-movie-as-director.addMoviesAsDirector'
]);

Route::get('add-movie-as-producer/{person}', [
    'uses' => 'Person\MovieOnPersonController@addMoviesAsProducer',
    'as' => 'add-movie-as-producer.addMoviesAsProducer'
]);

Route::put('movies-as-actor-update/{person}', [
    'uses' => 'Person\MovieOnPersonController@updateMoviesAsActor',
    'as' => 'movies-as-actor-update.updateMoviesAsActor'
]);

Route::put('movies-as-director-update/{person}', [
    'uses' => 'Person\MovieOnPersonController@updateMoviesAsDirector',
    'as' => 'movies-as-director-update.updateMoviesAsDirector'
]);

Route::put('movies-as-producer-update/{person}', [
    'uses' => 'Person\MovieOnPersonController@updateMoviesAsProducer',
    'as' => 'movies-as-producer-update.updateMoviesAsProducer'
]);

