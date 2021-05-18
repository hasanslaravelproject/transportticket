@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    <a href="{{ route('routes.index') }}" class="mr-4"><i class="icon ion-md-arrow-back"></i></a>
                    View Route
                </h4>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" value="{{ $route->name }}" readonly>
                </div>
            </div>
        </div>
    </div>
@endsection
