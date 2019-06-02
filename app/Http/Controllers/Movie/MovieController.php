<?php

namespace App\Http\Controllers\Movie;

use App\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class MovieController extends ApiController
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields_validated = $request->validate([
            'title' => 'required',
            'release_year' => 'required',
        ]);
        
        $movie = Movie::create($fields_validated);

        return $this->showOne($movie, 201);
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        if($request->has('title')) {
            $movie->title = $request->title;
        }
        if($request->has('release_year')) {
            $movie->release_year = $request->release_year;
        }

        if(!$movie->isDirty()) {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
        }

        $movie->save();

        return $this->showOne($movie);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();

        return $this->showOne($movie);
    }
}
