@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">Compartments</h4>
            </div>

            <div class="searchbar mt-4 mb-5">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <a href="{{ route('compartments.create') }}" class="btn btn-primary">
                            <i class="icon ion-md-add"></i> Create
                        </a>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>Name</th>
                            <th>Total Seat</th>
                            <th>Total Class</th>
                            <th>Transport</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($compartments as $key => $compartment)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $compartment->name }}</td>
                            <td>{{ $compartment->total_seat }}</td>
                            <td>{{ $compartment->total_class }}</td>
                            <td>{{ $compartment->transport_name }}</td>
                            <td>
                                <a href="{{ route('compartments.show', $compartment->id) }}" title="View details" class="btn btn-info btn-sm"><i class="icon ion-md-eye"></i></a>
                                <a href="{{ route('compartments.edit', $compartment->id) }}" title="Update data" class="btn btn-warning btn-sm"><i class="icon ion-md-create"></i></a>
                                <form action="{{ route('compartments.destroy', $compartment->id) }}" method="POST" onsubmit="return confirm('{{ __('Warning! Compartment related all data will lost! Are you sure to delete?') }}')" style="display: inline;">
                                    @csrf @method('DELETE')
                                    <button title="Delete data" type="submit" class="btn btn-danger btn-sm" ><i class="icon ion-md-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3">{!! $compartments->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
