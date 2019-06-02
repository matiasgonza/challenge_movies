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

Route::resource('front-persons', 'Front\PersonAccessController')->only(['show', 'index']);

Route::resource('front-movies', 'Front\MovieAccessController')->only(['show', 'index']);

Route::resource('persons', 'Person\PersonController')->except(['create', 'edit']);

Route::resource('movies', 'Movie\MovieController')->except(['create', 'edit']);

