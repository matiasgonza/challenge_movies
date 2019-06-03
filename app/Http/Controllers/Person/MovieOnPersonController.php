<?php

namespace App\Http\Controllers\Person;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Person;
use App\Movie;

class MovieOnPersonController extends ApiController
{
    public $person_customize;

    public function __construct()
    {
        $this->middleware('client.credentials');
    }

    /* Receives the id of the person and return all the movies where person is actor */
    public function getMoviesAsActor(Person $person)
    {
        $movies = $person->movies_actor()->get();
        return $this->showAll($movies);
    }

    /* Receives the id of the person and return all the movies where person is director */
    public function getMoviesAsDirector(Person $person)
    {
        $movies = $person->movies_director()->get();
        return $this->showAll($movies);
    }

    /* Receives the id of the person and return all the movies where person is producer */
    public function getMoviesAsProducer(Person $person)
    {
        $movies = $person->movies_producer()->get();
        return $this->showAll($movies);
    }

    /* Receives the id of the person and return all the movies where the person is not actor */
    public function addMoviesAsActor(Person $person)
    {
        $this->person_customize = $person;

        $movies = Movies::select('id','title')->whereDoesntHave('actors', function($query){
                $query->where('id', $this->person_customize->id);
            })->get();

        return $this->showAll($movies);
    }

    /* Receives the id of the person and return all the movies where the person is not director */
    public function addMoviesAsDirector(Person $person)
    {
        $movies = Movies::select('id','title')->whereDoesntHave('directors', function($query){
            $query->where('id', $this->person_customize->id);
        })->get();

        return $this->showAll($movies);
    }

    /* Receives the id of the person and return all the movies where the person is not producer */
    public function addMoviesAsProducer(Person $person)
    {
        $movies = Movies::select('id','title')->whereDoesntHave('producer', function($query){
            $query->where('id', $this->person_customize->id);
        })->get();

        return $this->showAll($movies);
    }

    /* Receives the id of the person and the field "movies" with ids of the movies to add */
    public function updatesMovieAsActor(Request $request, Person $person)
    {
        $person->movies_actor()->sync($request->movies);

        $person->movies_as_actor_actress = $person->movies_actor()->count();

        $person->save();

        return $this->showOne($person);
    }

    /* Receives the id of the movie and the field "movies" with ids of the people to add */
    public function updatesMovieAsDirector(Request $request, Person $person)
    {
        $person->movies_director()->sync($request->movies);

        $person->movies_as_director = $person->movies_director()->count();

        $person->save();

        return $this->showOne($person);
    }

    /* Receives the id of the movie and the field "movies" with ids of the people to add */
    public function updatesMovieAsProducer(Request $request, Person $person)
    {
        $person->movies_producer()->sync($request->movies);

        $person->movies_as_producer = $person->movies_producer()->count();

        $person->save();

        return $this->showOne($person);
    }
}
