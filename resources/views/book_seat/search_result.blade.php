<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Busschedule -find your seat</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            .error {
                color: #e90101;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="card">
                        <div class="card-header">{{ __('Find your seat') }}
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
                            <form id="form" method="GET" action="{{ URL::to('/search') }}">

                                <div class="form-group row">
                                    <label for="start_point" class="col-md-4 col-form-label text-md-right">{{ __('Start Point') }}</label>

                                    <div class="col-md-6">
                                        <select id="start_point" class="form-control @error('name') is-invalid @enderror" name="start_point" required>
                                            <option value="">Choose one</option>
                                            @foreach($routes as $route)
                                                <option value="{{ $route->id }}" @if($route->id == $start_point) selected @endif>{{ $route->name }}</option>
                                            @endforeach
                                        </select>

                                        @error('start_point')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="end_point" class="col-md-4 col-form-label text-md-right">{{ __('End Point') }}</label>

                                    <div class="col-md-6">
                                        <select id="end_point" class="form-control @error('end_point') is-invalid @enderror" name="end_point" required>
                                            <option value="">Choose one</option>
                                            @foreach($routes as $route)
                                                <option value="{{ $route->id }}" @if($route->id == $end_point) selected @endif>{{ $route->name }}</option>
                                            @endforeach
                                        </select>

                                        @error('end_point')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

                                    <div class="col-md-6">
                                        <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ $date }}" required>

                                        @error('date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="class" class="col-md-4 col-form-label text-md-right">{{ __('Class') }}</label>

                                    <div class="col-md-6">
                                        <select id="class" class="form-control @error('class') is-invalid @enderror" name="class" required>
                                            <option value="">Choose one</option>
                                            @foreach($classes as $class)
                                                <option value="{{ $class->id }}" @if($class->id == $_GET['class']) selected @endif>{{ $class->name }}</option>
                                            @endforeach
                                        </select>

                                        @error('class')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Search') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-body">
                            <table class="table bordrless table-hover">
                                <thead>
                                <tr class="card-header">
                                    <th>Name</th>
                                    <th>Route</th>
                                    <th>Departure</th>
                                    <th>Duration</th>
                                    <th>Arrival</th>
                                    <th>Operator</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($compartments as $compartment)
                                    @if(date('d', strtotime($compartment->start_date)) == date('d', strtotime($date)))
                                    <tr>
                                        <td>{{ $compartment->name }}</td>
                                        <td>
                                            @foreach($routes as $route)
                                                @if($route->id == $compartment->route_start)
                                                    {{ $route->name }}
                                                @endif
                                            @endforeach
                                            -
                                            @foreach($routes as $route)
                                                @if($route->id == $compartment->route_end)
                                                    {{ $route->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ date('F'). date(' d, Y', strtotime($compartment->start_date)) }} at
                                            {{ date(' h: i a', strtotime($compartment->start_time)) }}
                                            <br>
                                            @foreach($routes as $route)
                                                @if($route->id == $compartment->route_start)
                                                    {{ $route->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            <?php
                                                $datetime1 = new DateTime("$compartment->start_date $compartment->start_time");
                                                $datetime2 = new DateTime("$compartment->end_date $compartment->end_time");
                                                $interval = $datetime1->diff($datetime2);
                                            ?>
                                            @if($interval->format('%d') != 0)
                                                {{ $interval->format('%d')}} Days
                                            @endif
                                            @if($interval->format('%h') != 0)
                                               {{ $interval->format('%h') }} Hours
                                            @endif
                                            @if($interval->format('%i') != 0)
                                                {{ $interval->format('%i') }} Minutes
                                            @endif
                                        </td>
                                        <td>
                                            {{ date('F'). date(' d, Y', strtotime($compartment->end_date)) }} at
                                            {{ date(' h: i a', strtotime($compartment->end_time)) }}
                                            <br>
                                            @foreach($routes as $route)
                                                @if($route->id == $compartment->route_end)
                                                    {{ $route->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td><a href="{{ URL::to('book-ticket/'.$date.'/'.$compartment->id.'/'.$start_point.'/'.$end_point) }}" class="btn btn-primary btn-sm">Book</a></td>
                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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
                $("#date").attr('min',today);

                $('#start_point').on('change', function(){
                    var this_val = $(this).val();
                    $("#end_point option").prop('disabled', false);
                    $("#end_point option[value='"+this_val+"']").prop('disabled', true);
                });
                $('#end_point').on('change', function(){
                    var this_val = $(this).val();
                    $("#start_point option").prop('disabled', false);
                    $("#start_point option[value='"+this_val+"']").prop('disabled', true);
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

    </body>
</html>
