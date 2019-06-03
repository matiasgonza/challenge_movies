<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Movie;

class PersonOnMoviesFrontController extends Controller
{
    /* Receives the id of the movie and return all the people actor who are from the movie */
    public function getCasting(Movie $movie)
    {
        $people = $movie->actors()->paginate(10);
        return view('people.index', compact('people'));
    }

    /* Receives the id of the movie and return all the people director who are from the movie */
    public function getDirectors(Movie $movie)
    {
        $people = $movie->directors()->paginate(10);
        return view('people.index', compact('people'));
    }

    /* Receives the id of the movie and return all the people producer who are from the movie */
    public function getProducer(Movie $movie)
    {
        $people = $movie->producer()->paginate(10);
        return view('people.index', compact('people'));
    }
}
