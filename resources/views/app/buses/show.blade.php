@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('buses.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.buses.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.buses.inputs.name')</h5>
                    <span>{{ $bus->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.buses.inputs.image')</h5>
                    <x-partials.thumbnail
                        src="{{ $bus->image ? \Storage::url($bus->image) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.buses.inputs.bus_number')</h5>
                    <span>{{ $bus->bus_number ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.buses.inputs.company_id')</h5>
                    <span>{{ $bus->company_id ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.buses.inputs.seat_class_id')</h5>
                    <span>{{ $bus->seat_class_id ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.buses.inputs.bus_category_id')</h5>
                    <span>{{ $bus->bus_category_id ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('buses.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Bus::class)
                <a href="{{ route('buses.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
