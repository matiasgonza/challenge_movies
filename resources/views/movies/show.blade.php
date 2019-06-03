@extends('layouts.app')

@section('content')
<div class="container">
        <div class="form-group">
            <div class="card">
                <div class="card-body">
                <h3>{{ $movie->title }}</h3><br>
                <div class="btn-group mr-2" role="group" aria-label="First group">
                    <a class="btn btn-primary" href="{{ route('movie_casting.getCasting', $movie->id) }}" >Movies as actor</a>
                    <a class="btn btn-success" href="{{ route('movie_directors.getDirectors', $movie->id) }}">Movie as director</a>
                    <a class="btn btn-info" href="{{ route('movie_producer.getProducer', $movie->id) }}">Movies as producer</a>
                </div>
                </div>
            </div>  
        </div>
    </div> 
@endsection