@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">Routes</h4>
            </div>
            @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) ||
                                    Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
            <div class="searchbar mt-4 mb-5">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <a href="{{ route('routes.create') }}" class="btn btn-primary">
                            <i class="icon ion-md-add"></i> Create
                        </a>
                    </div>
                </div>
            </div>
            @endif

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($routes as $key => $route)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $route->name }}</td>
                            <td>
                                <a href="{{ route('routes.show', $route->id) }}" title="View details" class="btn btn-info btn-sm"><i class="icon ion-md-eye"></i></a>

                                @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) ||
                        Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
                                <a href="{{ route('routes.edit',  $route->id) }}" title="Update data" class="btn btn-warning btn-sm"><i class="icon ion-md-create"></i></a>
                                <form action="{{ route('routes.destroy',  $route->id) }}" method="POST" onsubmit="return confirm('{{ __('Warning! Route related all compartment & seats will be lost! Are you sure to delete?') }}')" style="display: inline;">
                                    @csrf  @method('DELETE')
                                    <button title="Delete data" type="submit" class="btn btn-danger btn-sm" ><i class="icon ion-md-trash"></i></button>
                                </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3">{!! $routes->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
