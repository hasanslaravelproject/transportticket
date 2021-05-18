@extends('layouts.app')

@section('content')
    <style>
        label.mr-2 {
            background: red;
            padding: 0px 5px;
            color: #fff !important;
            border-radius: 4px;
        }
        .row.seat-list {
            max-width: 345px;
        }
        .seat, .seat_view {
            background: #54685cb3;
            padding: 10px 0px;
            margin-top: 5px;
            width: 60px;
            text-align: center;
            color: #fff;
        }
        .editable .seat {
            cursor: pointer;
        }
        .error {
            color: #e90000;
        }
    </style>
    <div class="container">
        <div class="card">
            <div class="card-body">

                @if(isset($compartment->id))
                    <h4 class="card-title">
                        <a href="{{ route('generate-class.index') }}" class="mr-4"><i class="icon ion-md-arrow-back"></i></a>
                        Update Generated Class for <b>{{ $compartment->name }}</b>
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

                    <div class="row">
                        <div class="col-md-6">
                            <form id="form" action="{{ route('generate-class.update', $id) }}" method="post" class="mt-4">
                                @csrf  @method('PUT')

                                <input type="hidden" id="class_val" name="class_val">
                                <div class="form-group">
                                    <label for="class">Select Class</label><br>

                                    @foreach($classes as $class)
                                        <label class="mr-2" style="background: {{ $class->color }};"><input type="radio" name="class" class="class" color="{{ $class->color }}" value="{{ $class->id }}" required><b> {{ $class->name }}</b></label>
                                    @endforeach
                                </div>
                                <label id="class-error" class="error" for="class"></label>

                                <div class="form-group" id="select_seat" style="display: none;">
                                    <label for="class">Select seat</label>
                                    <div class="row seat-list editable">
                                        @foreach($seats as $k => $seat)
                                            <div class="col-3"><div class="seat deselect @foreach($class_in_seats as $key => $class_in_seat)@if($class_in_seat->seat_id == $seat)c{{ $class_in_seat->class_id }}@endif @endforeach"
                                                                    @foreach($class_in_seats as $key => $class_in_seat)
                                                                        @if($class_in_seat->seat_id == $seat)
                                                                            style="background:{{ $class_in_seat->color }} !important;"
                                                                        @endif
                                                                    @endforeach
                                                                    id="{{ $seat }}">{{ ++$k }}</div></div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                    <a class="btn btn-warning" id="reset" >Reset</a>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6 mt-5">
                            <h4>View Seats as per your class</h4>
                            <div class="row seat-list mt-5">
                                @foreach($seats as $k => $seat)
                                    <div class="col-3"><div class="seat_view"
                                        @foreach($class_in_seats as $key => $class_in_seat)
                                            @if($class_in_seat->seat_id == $seat)
                                                style="background:{{ $class_in_seat->color }} !important;"
                                            @endif
                                        @endforeach
                                    id="{{ $seat }}">{{ ++$k }}</div></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @else
                    <h5 class="text-danger">
                        <a href="{{ route('generate-class.index') }}" class="mr-4"><i class="icon ion-md-arrow-back"></i></a>
                        Whoops! Compartment not found</h5>
                @endif
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script>
        $(document).ready(function(){

            $('.class').on('change', function(){
                $('.seat').removeClass('selected');
                $('.seat').addClass('deselect');

                var class_val  = $('input[name=class]:checked').val();
                var class_color  = $('input[name=class]:checked').attr('color');
                $('#select_seat').show();

                if(class_val){
                    $(document).on('click','.deselect',function(){
                        $(this).css('background', class_color);
                        $(this).attr('class', 'seat selected c'+class_val);
                    });
                    $(document).on('click','.selected',function(){
                        $(this).css('background', '#54685cb3');
                        $(this).attr('class', 'seat deselect');
                    });

                }
            });

            $('#reset').on('click',function(){
                $('.seat').css('background', '#54685cb3');
                $('.seat').attr('class', 'seat deselect');
            });

            $('#form').on('submit', function(){
                var class_value = [];
                @foreach($classes as $key => $class)
                    var class_val = 'c{{ $class->id }}';
                    var class_{{ $key }} = $('.'+class_val).map(function() {
                        return $(this).attr('id');
                    });

                var i;
                for(i = 0; i < class_{{ $key }}.length; i++){
                    class_value.push(['{{ $class->id }}=>'+class_{{ $key }}[i]]);
                }
                @endforeach

                if(class_value.length == {{ count($seats) }}){
                    var class_values = class_value.join('||');
                    $('#class_val').val(class_values);
                }else{
                    alert('Please generate class for all seat');
                    return false;
                }
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
