@extends('admin.master')


@section('title')
    Manage Sub Category Page
@endsection



@section('body')
    <h1 class="text-center text-success">{{ session('message') }}</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title float-left pr-5">All Sub Category Information</h4>
                    <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Category Name</th>
                            <th>Sub Category Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($subCategories as $subCategory)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $subCategory->category->name }}</td>
                                <td>{{ $subCategory->name }}</td>
                                <td>{{ $subCategory->description }}</td>
                                <td> <img src="{{ asset($subCategory->image) }}" alt="" height="100" width="120"></td>
                                <td>{{ $subCategory->status }}</td>
                                <td>
                                    <a href="{{ route('sub-category.edit', [ 'id' => $subCategory->id]) }}" class="btn btn-success btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ route('sub-category.delete', [ 'id' => $subCategory->id]) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are sure to Delete...????');" >
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

