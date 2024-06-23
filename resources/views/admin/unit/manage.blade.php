@extends('admin.master')


@section('title')
    Manage Unit Page
@endsection



@section('body')
    <h1 class="text-center text-success">{{ session('message') }}</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title float-left pr-5">All Unit Information</h4>
                    <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($units as $unit)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $unit->name }}</td>
                                <td>{{ $unit->code }}</td>
                                <td>{{ $unit->description }}</td>
                                <td>{{ $unit->status }}</td>
                                <td>
                                    <a href="{{ route('unit.edit', [ 'id' => $unit->id]) }}" class="btn btn-success btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ route('unit.delete', [ 'id' => $unit->id ]) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete...???');" >
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->



@endsection

