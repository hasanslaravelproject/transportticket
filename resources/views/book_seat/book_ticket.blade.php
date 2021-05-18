<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Busschedule -book seat</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            label.mr-2 {
                background: red;
                padding: 0px 5px;
                color: #fff !important;
                border-radius: 4px;
            }
            .row.seat-list {
                max-width: 345px;
            }
            .seat {
                background: #54685cb3;
                padding: 10px 0px;
                margin-top: 5px;
                width: 60px;
                text-align: center;
                color: #fff;
                cursor: pointer;
                opacity: .7;
            }
            .selected {
                background: #5b69bc !important;
                opacity: 1;
                border: 2px solid #000;
                box-shadow: inset 0px 0px 3px 0px white;
            }
            .was-validated .form-control:invalid, .form-control.is-invalid {
                border-color: #e3342f;
                padding-right: calc(1.6em + 0.75rem);
                background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='none' stroke='%23e3342f' viewBox='0 0 12 12'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23e3342f' stroke='none'/%3e%3c/svg%3e);
                background-repeat: no-repeat;
                background-position: right calc(0.4em + 0.1875rem) center;
                background-size: calc(0.8em + 0.375rem) calc(0.8em + 0.375rem);
            }
            .error, .required {
                color: #e90000;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"> {{ __('Book your ticket') }} : @if($compartment !='') {{ $compartment->name }} @else <span class="text-danger">Seat Not available</span> @endif
                            @guest
                            <a class="nav-link text-right" style="float:right;" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @else
                                <a style="float:right;" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @endguest
                        </div>
                        <div class="card-body">
                            @if($compartment !='' && date('d', strtotime($compartment->start_date)) == date('d', strtotime($date)))
                            <div class="row">
                                <div class="col-md-6">
                                    @foreach($classes as $class)
                                        <label class="mr-2" style="background: {{ $class->color }};"><b> {{ $class->name }}</b></label>
                                    @endforeach
                                        <label class="mr-2" style="background: #5b69bc;"><b> Selected</b></label>
                                        <label class="mr-2" style="background: #54685cb3;"><b> Unavailable</b></label>

                                    <h5 class="text-success mt-2 mb-5">Click on Seat to select / deselect</h5>
                                    <div class="row seat-list">
                                        @foreach($seats as $k => $seat)
                                            <div class="col-3">
                                                <div class="seat deselected
                                                @foreach($booked_seats as $key => $booked_seat)
                                                <?php
                                                    $my_date_time = date("Y-m-d H:i:s", strtotime("-2 hours"));
                                                    $datetime1 = new DateTime("$booked_seat->created_at");
                                                    $datetime2 = new DateTime("$my_date_time");
                                                    $interval = $datetime1->diff($datetime2);
                                                ?>
                                                    @if($booked_seat->seat_id == $seat && $booked_seat->journey_date == $date && $booked_seat->booking_status == 1 && $interval->format('%h') < 2)
                                                        disabled
                                                    @elseif($booked_seat->seat_id == $seat && $booked_seat->journey_date == $date && $booked_seat->booking_status == 2)
                                                        disabled
                                                    @endif
                                                @endforeach
                                                "
                                                         @foreach($booked_seats as $key => $booked_seat)
                                                                 <?php
                                                                     $my_date_time = date("Y-m-d H:i:s", strtotime("-2 hours"));
                                                                     $datetime1 = new DateTime("$booked_seat->created_at");
                                                                     $datetime2 = new DateTime("$my_date_time");
                                                                     $interval = $datetime1->diff($datetime2);
                                                                 ?>
                                                             @if($booked_seat->seat_id == $seat && $booked_seat->journey_date == $date && $booked_seat->booking_status == 1 && $interval->format('%h') < 2)
                                                                 style="background: #54685cb3;"
                                                             @elseif($booked_seat->seat_id == $seat && $booked_seat->journey_date == $date && $booked_seat->booking_status == 2)
                                                                style="background: #54685cb3;"
                                                             @endif
                                                         @endforeach
                                                        @foreach($class_in_seats as $key => $class_in_seat)
                                                            @if($class_in_seat->seat_id == $seat)
                                                                style="background:{{ $class_in_seat->color }};"
                                                                price="{{ $class_in_seat->seat_price }}"
                                                            @endif
                                                        @endforeach
                                                        id="{{ $seat }}">{{ ++$k }}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-6">
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

                                    <form id="form" method="post" action="{{ URL::to('storeTicket/'.$id) }}">
                                        @csrf
                                        <input type="hidden" id="seat_id" name="seat_id">
                                        <input type="hidden" id="date" name="date" value="{{ $date }}">
                                        <input type="hidden" id="start" name="start" value="{{ $start }}">
                                        <input type="hidden" id="end" name="end" value="{{ $end }}">

                                        <div class="form-group">
                                            <label for="first_name">First Name <span class="required">*</span></label>
                                            <input type="text" class="form-control" id="first_name" @if(auth()->user() != null && $user_info != null) value="{{ $user_info->first_name }}"@else value="{{ old('first_name') }}" @endif name="first_name" placeholder="Enter your first name" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="last_name">Last Name <span class="required">*</span></label>
                                            <input type="text" class="form-control" id="last_name" @if(auth()->user() != null && $user_info != null) value="{{ $user_info->last_name }}" @else value="{{ old('last_name') }}" @endif name="last_name" placeholder="Enter your last name" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="number" min="6" class="form-control" @if(auth()->user() != null && $user_info != null) value="{{ $user_info->phone }}" @else value="{{ old('phone') }}" @endif id="phone" name="phone" placeholder="Enter you phone number">
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email <span class="required">*</span></label>
                                            <input type="email" class="form-control" id="email" @if(auth()->user() != null) value="{{ auth()->user()->email }}"@else value="{{ old('email') }}" @endif name="email" placeholder="Enter your email" required>
                                        </div>

                                        @if(auth()->user() == null)
                                        <div class="form-group">
                                            <label for="password">Password <span class="required">*</span></label>
                                            <input type="password" class="form-control" id="password" minLength="8" name="password" placeholder="Enter your password" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="con_password">Confirm Password <span class="required">*</span></label>
                                            <input type="password" class="form-control" id="con_password" name="password_confirmation" placeholder="Re-enter your password" required>
                                        </div>
                                        @endif

                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea class="form-control" id="address" name="address" placeholder="Enter your address">@if(auth()->user() != null && $user_info != null){{ $user_info->address }}@else{{ old('address') }}@endif</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="payment_method"><b>Payment Method</b></label><br>
                                            <label><input type="radio" class="payment_method" value="cash" name="payment_method" required> Cash</label>
                                            <label><input type="radio" class="payment_method" value="online" name="payment_method" required> Online</label>
                                        </div>
                                        <label id="payment_method-error" class="error" for="payment_method"></label>


                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit" id="submit">Submit</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                            @else
                                <h5 class="text-danger">Compartment not available right now</h5>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>
        <script>
            $(document).ready(function(){
                $('.disabled').attr('class','seat');
                $(document).on('click', '.deselected', function(){
                    var max_selected = $('.selected').length;
                    if(max_selected < 4 ){
                        $(this).attr('class', 'seat selected');
                    }else{
                        alert('You can select maximum 4 seat');
                    }
                });
                $(document).on('click', '.selected', function(){
                    $(this).attr('class', 'seat deselected');
                });

                $('.payment_method').on('change', function(){
                    var this_val = $(this).val();

                    if(this_val == 'cash'){
                        $('#submit').text('Book for 2 hours');
                    }else{
                        $('#submit').text('Submit');
                    }
                });

                $('#form').on('submit', function(){
                    var seat_ids = [];
                    var seat_id = $('.selected').map(function() {
                        return $(this).attr('id');
                    });

                    for(i = 0; i < seat_id.length; i++){
                        seat_ids.push(seat_id[i]);
                    }
                    if(seat_ids.length > 0){
                        $('#seat_id').val(seat_ids);
                        $('#date').val({{ $date }});
                        $('#start').val({{ $start }});
                        $('#end').val({{ $end }});
                    }else{
                        alert('You Must select at least 1 seat');
                        return false;
                    }
                });
            });
            $("#form").validate(
                    {
                        ignore: [],
                        debug: false,
                        rules: {
                            password_confirmation:{
                                equalTo: "#password"
                            }
                        },
                        messages: {
                            password_confirmation: {
                                equalTo:"Your given password is not a match with password"
                            }
                        }
                    });
        </script>

    </body>
</html>
