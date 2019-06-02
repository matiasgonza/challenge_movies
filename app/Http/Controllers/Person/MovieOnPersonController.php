<?php

namespace App\Http\Controllers\Person;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Person;
use App\Movie;

class MovieOnPersonController extends ApiController
{
    /* Receives the id of the person and return all the movies where person is actor */
    public function getMovieAsActor(Person $person)
    {

    }

    /* Receives the id of the person and return all the movies where person is director */
    public function getMoviesAsDirector(Person $person)
    {

    }

    /* Receives the id of the person and return all the movies where person is producer */
    public function getMoviesAsProducer(Person $person)
    {

    }

    /* Receives the id of the person and return all the movies */
    public function getMoviesOfThePerson(Person $person)
    {

    }

    /* Receives the id of the person and return all the movies where the person is not actor */
    public function addMovieAsActor(Person $person)
    {

    }

    /* Receives the id of the person and return all the movies where the person is not director */
    public function addMovieAsDirector(Person $person)
    {

    }

    /* Receives the id of the person and return all the movies where the person is not producer */
    public function addMovieAsProducer(Person $person)
    {

    }

    /* Receives the id of the person and the ids of the movies to add */
    public function storeNewMovieAsActor(Request $request, Person $person)
    {

    }

    /* Receives the id of the movie and the ids of the people to add */
    public function storeNewMovieAsDirector(Request $request, Person $person)
    {
        
    }

    /* Receives the id of the movie and the ids of the people to add */
    public function storeNewMovieAsProducer(Request $request, Person $person)
    {
        
    }
}
