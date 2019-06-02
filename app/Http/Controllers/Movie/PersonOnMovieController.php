<?php

namespace App\Http\Controllers\Movie;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Person;
use App\Movie;

class PersonOnMovieController extends ApiController
{
    /* Receives the id of the movie and return all the people actor who are from the movie */
    public function getCasting(Movie $movie)
    {

    }

    /* Receives the id of the movie and return all the people director who are from the movie */
    public function getDirectors(Movie $movie)
    {

    }

    /* Receives the id of the movie and return all the people producer who are from the movie */
    public function getProducer(Movie $movie)
    {

    }

    /* Receives the id of the movie and return all the people who are from the movie */
    public function getPeopleOnMovie(Movie $movie)
    {

    }

    /* Receives the id of the movie and return all the people who are not casting */
    public function addPersonCasting(Movie $movie)
    {

    }

    /* Receives the id of the movie and return all the people who are not directors */
    public function addPersonDirectors(Movie $movie)
    {

    }

    /* Receives the id of the movie and return all the people who are not producer */
    public function addPersonProducer(Movie $movie)
    {

    }

    /* Receives the id of the movie and the ids of the people to add */
    public function storeNewCasting(Request $request, Movie $movie)
    {

    }

    /* Receives the id of the movie and the ids of the people to add */
    public function storeNewDirectos(Request $request, Movie $movie)
    {
        
    }

    /* Receives the id of the movie and the ids of the people to add */
    public function storeNewProducer(Request $request, Movie $movie)
    {
        
    }
}
