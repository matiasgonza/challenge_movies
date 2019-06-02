<?php

namespace App\Http\Controllers\Front;

use App\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class MovieAccessController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();

        return $this->showAll($movies);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return $this->showOne($movie);
    }
}
