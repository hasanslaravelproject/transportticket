@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('routes.index') }}" class="mr-4"><i class="icon ion-md-arrow-back"></i></a>
                Create Route
            </h4>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) ||
    Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
            <form id="form" action="{{ route('routes.store') }}" method="post" class="mt-4">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter transport name" required>
                </div>

                <div class="form-group">
                    <button class="btn btn-success btn-sm" type="submit">Submit</button>
                </div>
            </form>
                @else
                <h2 class="text-danger">Whoops! You are not permitted</h2>
            @endif
        </div>
    </div>
</div>
@endsection
