<?php

namespace App\Http\Controllers\Movie;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Person;
use App\Movie;

class PersonOnMovieController extends ApiController
{
    public $movie_customize;

    public function __construct()
    {
        $this->middleware('client.credentials');
    }

    /* Receives the id of the movie and return all the people actor who are from the movie */
    public function getCasting(Movie $movie)
    {
        $people = $movie->actors()->get();
        return $this->showAll($people);
    }

    /* Receives the id of the movie and return all the people director who are from the movie */
    public function getDirectors(Movie $movie)
    {
        $people = $movie->directors()->get();
        return $this->showAll($people);
    }

    /* Receives the id of the movie and return all the people producer who are from the movie */
    public function getProducer(Movie $movie)
    {
        $people = $movie->producer()->get();
        return $this->showAll($people);
    }

    /* Receives the id of the movie and return all the people who are not casting */
    public function addPersonCasting(Movie $movie)
    {
        $this->movie_customize = $movie;

        $people = Person::select('id','first_name')->whereDoesntHave('movies_actor', function($query){
                $query->where('id', $this->movie_customize->id);
            })->get();

        return $this->showAll($people);
    }

    /* Receives the id of the movie and return all the people who are not directors */
    public function addPersonDirectors(Movie $movie)
    {
        $this->movie_customize = $movie;

        $people = Person::select('id','first_name')->whereDoesntHave('movies_director', function($query){
                $query->where('id', $this->movie_customize->id);
            })->get();
        
        return $this->showAll($people);
    }

    /* Receives the id of the movie and return all the people who are not producer */
    public function addPersonProducer(Movie $movie)
    {
        $this->movie_customize = $movie;

        $people = Person::select('id','first_name')->whereDoesntHave('movies_producer', function($query){
                $query->where('id',$this->movie_customize->id);
            })->get();
        
        return $this->showAll($people);
    }

    /* Receives the id of the movie and the field "actors" with ids of the people to add */
    public function updateCasting(Request $request, Movie $movie)
    {
        $movie->actors()->sync($request->actors);

        $movie->casting = $movie->actors()->count();

        $movie->save();
        
        return $this->showOne($movie);
    }

    /* Receives the id of the movie and the field "directors" with ids of the people to add */
    public function updateDirectors(Request $request, Movie $movie)
    {
        $movie->directors()->sync($request->directors);

        $movie->directors = $movie->directors()->count();
        
        $movie->save();

        return $this->showOne($movie);
    }

    /* Receives the id of the movie and the  field "producer" with ids of the people to add */
    public function updateProducer(Request $request, Movie $movie)
    {
        $movie->producer()->sync($request->producer);

        $movie->producer = $movie->producer()->count();

        $movie->save();

        return $this->showOne($movie);
    }
}
