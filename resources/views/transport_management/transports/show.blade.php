@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    <a href="{{ route('transports.index') }}" class="mr-4"><i class="icon ion-md-arrow-back"></i></a>
                    View Transport
                </h4>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" value="{{ $transport->name }}" disabled>
                </div>
                <div class="form-group">
                    <label for="author">Author</label>
                    <select name="author" id="author" class="form-control" readonly>
                        @foreach($users as $user)
                            @if($user->id == $transport->author_id)
                                <option value="{{ $user->id }}"  selected>{{ $user->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
@endsection
