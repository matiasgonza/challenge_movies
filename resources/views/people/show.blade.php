@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-group">
        <div class="card">
            <div class="card-body">
                <h4>{{ $person->first_name }}</h4><br>
                <h5>{{ $person->last_name }}</h5>
            </div>
        </div>  
    </div>
</div>
@endsection