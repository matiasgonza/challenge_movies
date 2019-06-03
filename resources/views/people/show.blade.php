@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-group">
        <div class="card">
            <div class="card-body">
                <h4>{{ $person->first_name }}</h4><br>
                <h5>{{ $person->last_name }}</h5><br>
                <div class="btn-group mr-2" role="group" aria-label="First group">
                    <a class="btn btn-primary" href="{{ route('person.movies_as_actor', $person->id) }}" >Movies as actor</a>
                    <a class="btn btn-success" href="{{ route('person.movies_as_director', $person->id) }}">Movie as director</a>
                    <a class="btn btn-info" href="{{ route('person.movies_as_producer', $person->id) }}">Movies as producer</a>
                </div>
            </div>
        </div>  
    </div>
</div>
@endsection