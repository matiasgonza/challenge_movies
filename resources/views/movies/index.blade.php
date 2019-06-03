@extends('layouts.app')

@section('content')

@foreach ($movies as $movie)
<div class="container">
    <div class="form-group">
        <div class="card">
            <div class="card-body">
                <h3>{{ $movie->title }}</h3><br>
                <a class="btn btn-primary" href="{{ route('movies.show', $movie->id) }}">Ver Movie</a>
            </div>
        </div>  
    </div>
</div>
@endforeach
<div class="container">
    {!! $movies->links() !!}
</div>

@endsection