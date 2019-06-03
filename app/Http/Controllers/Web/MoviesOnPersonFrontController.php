<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Person;

class MoviesOnPersonFrontController extends Controller
{
    /* Receives the id of the person and return all the movies where person is actor */
    public function getMoviesAsActor(Person $person)
    {
        $movies = $person->movies_actor()->paginate(10);
        return view('movies.index', compact('movies'));
    }

    /* Receives the id of the person and return all the movies where person is director */
    public function getMoviesAsDirector(Person $person)
    {
        $movies = $person->movies_director()->paginate(10);
        return view('movies.index', compact('movies'));
    }

    /* Receives the id of the person and return all the movies where person is producer */
    public function getMoviesAsProducer(Person $person)
    {
        $movies = $person->movies_producer()->paginate(10);
        return view('movies.index', compact('movies'));
    }
}
