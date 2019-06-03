@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Guest</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <a class="btn btn-primary btn-block" href="{{ route('movies.index') }}">All movies</a>
                    </div>
                    <div class="form-group">
                        <a class="btn btn-success btn-block" href="{{ route('person.index') }}">All Person</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
