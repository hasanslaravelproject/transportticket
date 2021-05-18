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
                    <a href="{{ route('compartments.index') }}" class="mr-4"><i class="icon ion-md-arrow-back"></i></a>
                    Edit Compartment
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

                <form id="form" action="{{ route('compartments.update', $compartment->id) }}" method="post" class="mt-4">
                    @csrf @method('PUT')

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $compartment->name }}" placeholder="Enter compartment name" required>
                    </div>

                    <div class="form-group">
                        <label for="toal_seat">Total Seat</label>
                        <input type="number" class="form-control" name="total_seat" id="total_seat" value="{{ $compartment->total_seat }}" placeholder="Enter total seat" required>
                    </div>

                    <div class="form-group">
                        <label for="class">Select Class</label>
                        <select class="form-control" name="class[]" id="class" required multiple>
                            <option value="" disabled>Choose class</option>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}" @if(in_array($class->id, $class_in_compartment)) selected @endif style="color: {{ $class->color }} !important;">{{ $class->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label id="class[]-error" class="error" for="class[]" style="display: none;"></label>

                    <div class="form-group">
                        <label for="transport">Transport</label>
                        <select class="form-control" name="transport" id="transport" required>
                            <option value="">Choose one</option>
                            @foreach($transports as $transport)
                                <option value="{{ $transport->id }}" @if($compartment->transport_id == $transport->id) selected @endif>{{ $transport->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <h5>Add Date & Time Schedule in Routes:</h5><br>

                    @foreach($schedules as $key => $schedule)
                        <div class="schedules_area">
                            @if($key != 0)
                             <span class="btn btn-danger btn-sm mr-2 remove">&times;</span>
                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="route_start_{{ $key }}">Route Start</label>
                                        <select class="form-control route_start" name="route_start[]" id="route_start_{{ $key }}" required>
                                            <option value="">Choose one</option>
                                            @foreach($routes as $route)
                                                <option value="{{ $route->id }}" @if($schedule->route_start == $route->id) selected @endif @if($schedule->route_end == $route->id) disabled @endif>{{ $route->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="route_end_{{ $key }}">Route End</label>
                                        <select class="form-control route_end" name="route_end[]" id="route_end_{{ $key }}" required>
                                            <option value="">Choose one</option>
                                            @foreach($routes as $route)
                                                <option value="{{ $route->id }}" @if($schedule->route_end == $route->id) selected @endif @if($schedule->route_start == $route->id) disabled @endif>{{ $route->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="start_date_{{ $key }}"><b>Start at</b>: Date</label>
                                                <input type="date" class="form-control start" value="{{ $schedule->start_date }}" name="start_date[]" id="start_date_{{ $key }}" required>
                                            </div>
                                            <div class="col-6">
                                                <label for="start_time">Time</label>
                                                <input type="time" class="form-control" value="{{ $schedule->start_time }}" name="start_time[]" id="start_time" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="end_date_{{ $key }}"><b>End at</b>: Date</label>
                                                <input type="date" class="form-control" value="{{ $schedule->end_date }}" min="{{ $schedule->start_date }}" name="end_date[]" id="end_date_{{ $key }}" required>
                                            </div>
                                            <div class="col-6">
                                                <label for="end_time">Time</label>
                                                <input type="time" class="form-control" value="{{ $schedule->end_time }}" name="end_time[]" id="end_time" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <span id="schedules"></span>
                    <a id="add_schedule" class="btn btn-primary btn-sm mb-4">Add more</a>

                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            var today = new Date();
            var dd = String(today. getDate()). padStart(2, '0');
            var mm = String(today. getMonth() + 1). padStart(2, '0'); //January is 0!
            var yyyy = today. getFullYear();
            today = yyyy + '-' + mm + '-' + dd;

            var i = {{ count($schedules) }};
            $('#add_schedule').on('click', function(){
                var time = new Date();
                var min = time. getMinutes();
                var hours = time. getHours();
                time = hours + ':' + min;
                $('#schedules').append('<div class="schedules_area">' +
                        '<span class="btn btn-danger btn-sm mr-2 remove">&times;</span>'+
                        '<div class="row">'+
                        '<div class="col-md-6">'+
                        '<div class="form-group">'+
                        '<label for="route_start_'+i+'">Route Start</label>'+
                        '<select class="form-control route_start" name="route_start[]" id="route_start_'+i+'" required>'+
                        '<option value="">Choose one</option>'+
                        @foreach($routes as $route)
                            '<option value="{{ $route->id }}">{{ $route->name }}</option>'+
                        @endforeach
                   '</select>'+
                        '</div>'+
                        '</div>'+
                        '<div class="col-md-6">'+
                        '<div class="form-group">'+
                        '<label for="route_end_'+i+'">Route End</label>'+
                        '<select class="form-control route_end" name="route_end[]" id="route_end_'+i+'" required>'+
                        '<option value="">Choose one</option>'+
                        @foreach($routes as $route)
                            '<option value="{{ $route->id }}" >{{ $route->name }}</option>'+
                        @endforeach
                    '</select>'+
                        '</div>'+
                        '</div>'+
                        '</div>'+

                        '<div class="row">'+
                        '<div class="col-md-6">'+
                        '<div class="form-group">'+
                        '<div class="row">'+
                        '<div class="col-6">'+
                        '<label for="start_date_'+i+'"><b>Start at</b>: Date</label>'+
                        '<input type="date" class="form-control start" name="start_date[]" value="'+today+'" id="start_date_'+i+'" required>'+
                        '</div>'+
                        '<div class="col-6">'+
                        '<label for="start_time">Time</label>'+
                        '<input type="time" class="form-control" name="start_time[]" value="'+time+'" id="start_time" required>'+
                        '</div>'+
                        '</div>'+
                        '</div>'+
                        '</div>'+
                        '<div class="col-md-6">'+
                        '<div class="form-group">'+
                        '<div class="row">'+
                        '<div class="col-6">'+
                        '<label for="end_date_'+i+'"><b>End at</b>: Date</label>'+
                        '<input type="date" class="form-control" name="end_date[]" value="'+today+'" id="end_date_'+i+'" required>'+
                        '</div>'+
                        '<div class="col-6">'+
                        '<label for="end_time">Time</label>'+
                        '<input type="time" class="form-control" name="end_time[]" value="'+time+'" id="end_time" required>'+
                        '</div>'+
                        '</div>'+
                        '</div>'+
                        '</div>'+
                        '</div>'+
                        '</div>');
                i++;
            });
            $(document).on('click', '.remove', function () {
                $(this).parent('.schedules_area').remove();
            });
            $(document).on('change', '.start', function(){
                var min = $(this).val();
                var ids = $(this).attr('id');
                var id = ids.substr(ids.length - 1);
                $('#end_date_'+id).val(min);
                $('#end_date_'+id).attr('min', min);
            });


            $(document).on('change','.route_start', function(){
                var this_id = $(this).attr('id').substr($(this).attr('id').length - 1);
                var this_val = $(this).val();
                $("#route_end_"+this_id+" option").prop('disabled', false);
                $("#route_end_"+this_id+" option[value='"+this_val+"']").prop('disabled', true);
            });
            $(document).on('change','.route_end', function(){
                var this_id = $(this).attr('id').substr($(this).attr('id').length - 1);
                var this_val = $(this).val();
                $("#route_start_"+this_id+" option").prop('disabled', false);
                $("#route_start_"+this_id+" option[value='"+this_val+"']").prop('disabled', true);
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
