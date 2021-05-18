@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    <a href="{{ route('compartments.index') }}" class="mr-4"><i class="icon ion-md-arrow-back"></i></a>
                    Show Compartment
                </h4>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" value="{{ $compartment->name }}" readonly>
                </div>

                <div class="form-group">
                    <label for="toal_seat">Total Seat</label>
                    <input type="number" class="form-control" value="{{ $compartment->total_seat }}" readonly>
                </div>

                <div class="form-group">
                    <label for="class">Available Class</label><br>
                        @foreach($classes as $class)
                            @if(in_array($class->id, $class_in_compartment))<span class="badge badge-secondary" style="background: {{ $class->color }} !important; color: #fff;">{{ $class->name }}</span>@endif
                        @endforeach
                </div>

                <div class="form-group">
                    <label for="transport">Transport</label>
                    <select class="form-control" disabled>
                        @foreach($transports as $transport)
                            <option value="{{ $transport->id }}" @if($compartment->transport_id == $transport->id) selected @endif>{{ $transport->name }}</option>
                        @endforeach
                    </select>
                </div>

                <h5>Date & Time Schedule in Routes:</h5><br>

                @foreach($schedules as $key => $schedule)
                    <div class="schedules_area">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="route_start_{{ $key }}">Route Start</label>
                                    <select class="form-control route_start" name="route_start[]" id="route_start_{{ $key }}" disabled>
                                        @foreach($routes as $route)
                                            @if($schedule->route_start == $route->id)
                                                <option value="{{ $route->id }}" >{{ $route->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="route_end_{{ $key }}">Route End</label>
                                    <select class="form-control route_end" name="route_end[]" id="route_end_{{ $key }}" disabled>
                                        @foreach($routes as $route)
                                            @if($schedule->route_end == $route->id)
                                                <option value="{{ $route->id }}">{{ $route->name }}</option>
                                            @endif
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
                                            <input type="date" class="form-control start" value="{{ $schedule->start_date }}" name="start_date[]" id="start_date_{{ $key }}" disabled>
                                        </div>
                                        <div class="col-6">
                                            <label for="start_time">Time</label>
                                            <input type="time" class="form-control" value="{{ $schedule->start_time }}" name="start_time[]" id="start_time" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="end_date_{{ $key }}"><b>End at</b>: Date</label>
                                            <input type="date" class="form-control" value="{{ $schedule->end_date }}" name="end_date[]" id="end_date_{{ $key }}" disabled>
                                        </div>
                                        <div class="col-6">
                                            <label for="end_time">Time</label>
                                            <input type="time" class="form-control" value="{{ $schedule->end_time }}" name="end_time[]" id="end_time" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
