@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('bus-categories.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.bus_categories.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.bus_categories.inputs.name')</h5>
                    <span>{{ $busCategory->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.bus_categories.inputs.total seat')</h5>
                    <span>{{ $busCategory->total seat ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.bus_categories.inputs.seatnumbers')</h5>
                    <span>{{ $busCategory->seatnumbers ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('bus-categories.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\BusCategory::class)
                <a
                    href="{{ route('bus-categories.create') }}"
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
