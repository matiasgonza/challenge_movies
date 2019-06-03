@extends('layouts.app')

@section('content')

@foreach ($people as $person)
<div class="container">
    <div class="form-group">
        <div class="card">
            <div class="card-body">
                <h4>{{ $person->first_name }}</h4><br>
                <h5>{{ $person->last_name }}</h5>
                <a class="btn btn-primary" href="{{ route('person.show', $person->id) }}">Mostrar Persona</a>
            </div>
        </div>  
    </div>
</div>
@endforeach
<div class="container">
    {!! $people->links() !!}
</div>

@endsection