@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}">
    <style>
        .error {
            color: #df0000;
        }
    </style>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('class.index') }}" class="mr-4"><i class="icon ion-md-arrow-back"></i></a>
                Create Class
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

            <form id="form" action="{{ route('class.store') }}" method="post" class="mt-4">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Enter class name" required>
                </div>

                <div class="form-group">
                    <label for="color">Seat Color</label>
                    <input type="color" class="form-control" name="color" id="color" value="{{ old('color') }}" placeholder="Choose class color" required>
                </div>

                <div class="form-group">
                    <label for="price">Price per Seat</label>
                    <input type="number" class="form-control" min="1" name="price" id="price" value="{{ old('price') }}" placeholder="Choose seat price" required>
                </div>

                <div class="form-group">
                    <label for="transport_id">Transport</label>
                    <select name="transport_id" id="transport_id" class="form-control">
                        <option value="">Choose one</option>
                        @foreach($transports as $transport)
                            <option value="{{ $transport->id }}">{{ $transport->name }}</option>
                        @endforeach
                    </select>
                </div>

                <span id="special_price_elements"></span>

                <div class="form-group">
                    <a class="btn btn-info btn-sm text-light special_price"><i class="icon ion-md-add"></i> Add Special Price</a>
                </div>

                <div class="form-group">
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/toastr.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script>
    $(document).ready(function () {
        var today = new Date();
        var dd = String(today. getDate()). padStart(2, '0');
        var mm = String(today. getMonth() + 1). padStart(2, '0'); //January is 0!
        var yyyy = today. getFullYear();
        today = yyyy + '-' + mm + '-' + dd;

        var i = 0;
        $('.special_price').on('click', function(){
            $('#special_price_elements').append('<input type="hidden" value="1" name="s_status">');
            $('#special_price_elements').append('<div class="form-group s_p_area">'+
                    '<label>Special Price Duration</label>'+
                    '<span class="btn btn-danger btn-sm ml-2 remove_s_price">&times;</span>'+
            '<div class="row mb-2">'+
                    '<div class="col-md-6">'+
                    '<label for="start_date_'+i+'">Start Date</label>'+
            '<input type="date" class="form-control start" value="'+today+'" name="start_date[]" min="'+today+'" id="start_date_'+i+'" required>'+
                    '</div>'+
                    '<div class="col-md-6">'+
                    '<label for="end_date_'+i+'">End Date</label>'+
            '<input type="date" class="form-control end" name="end_date[]" value="'+today+'" min="'+today+'" id="end_date_'+i+'" required>'+
                    '</div>'+
                    '</div>'+
                    '<label for="s_price">Special Price</label>'+
            '<input type="number" class="form-control" min="1" name="s_price[]" id="s_price" placeholder="Ennter seat special price" required>'+
            '</div>');
            i++;
        });

        $(document).on('click', '.remove_s_price', function(){
            $(this).parent('.s_p_area').remove();
        });

        $(document).on('change', '.start', function(){
            var min = $(this).val();
            var ids = $(this).attr('id');
            var id = ids.substr(ids.length - 1);
            $('#end_date_'+id).val(min);
            $('#end_date_'+id).attr('min', min);
        });
    });

    $("#form").validate(
            {
                ignore: [],
                debug: false,
                rules: {},
                messages: {}
            });
</script>
@endsection
