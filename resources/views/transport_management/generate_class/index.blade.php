@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">Class Generate</h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>Compartment Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($compartments as $key => $compartment)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $compartment->name }}</td>
                            <td>
                                <a href="{{ route('generate-class.edit', $compartment->id) }}" title="Generate Class" class="btn btn-warning btn-sm"><i class="icon ion-md-create"></i> Generate Class</a>
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
