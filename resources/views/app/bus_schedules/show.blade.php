@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('bus-schedules.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.bus_schedules.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.bus_schedules.inputs.date')</h5>
                    <span>{{ $busSchedule->date ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.bus_schedules.inputs.bus_id')</h5>
                    <span>{{ $busSchedule->bus_id ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.bus_schedules.inputs.bus_route_id')</h5>
                    <span>{{ $busSchedule->bus_route_id ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('bus-schedules.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\BusSchedule::class)
                <a
                    href="{{ route('bus-schedules.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
