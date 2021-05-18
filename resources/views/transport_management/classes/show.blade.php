@extends('layouts.app')

@section('content')
    <style>
        .border {
            border: 1px solid #c2c8ce !important;
            padding: 12px;
            margin: 12px 1px;
        }
    </style>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    <a href="{{ route('class.index') }}" class="mr-4"><i class="icon ion-md-arrow-back"></i></a>
                    Show Class
                </h4>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" value="{{ $class->name }}" readonly>
                </div>

                <div class="form-group">
                    <label for="color">Seat Color</label>
                    <input type="color" class="form-control"  value="{{ $class->color }}" disabled>
                </div>

                <div class="form-group">
                    <label for="price">Price per Seat</label>
                    <input type="number" class="form-control" value="{{ $class->seat_price }}" readonly>
                </div>

                <div class="form-group">
                    <label for="transport_id">Transport</label>
                    <select name="transport_id" id="transport_id" class="form-control" disabled>
                        @foreach($transports as $transport)
                            @if($transport->id == $class->transport_id)
                                <option value="{{ $transport->id }}" >{{ $transport->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                @if(count($special_price) > 0)
                {{--if avaiable--}}
                <div class="form-group">
                    <label><b>Special Price Duration</b></label>
                    @foreach($special_price as $s_price)

                            @if(date('Y-m-d') > $s_price->start_date)
                        <div class="border" style="border-color: red !important;">
                            <h6 class="text-danger">Offer finished</h6>
                            @else
                        <div class="border">
                            @endif
                            <div class="row mt-4 mb-2">
                                <div class="col-md-6">
                                    <label for="start_date">Start Date</label>
                                    <input type="text" class="form-control" value="{{ $s_price->start_date }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="end_date">End Date</label>
                                    <input type="text" class="form-control" value="{{ $s_price->end_date }}" readonly>
                                </div>
                            </div>
                            <label for="s_price">Special Price</label>
                            <input type="number" class="form-control" value="{{ $s_price->price }}" readonly>
                        </div>
                    @endforeach
                </div>
                    {!! $special_price->render() !!}
                @endif
            </div>
        </div>
    </div>
@endsection
