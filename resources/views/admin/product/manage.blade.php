@extends('admin.master')


@section('title')
    Manage Product Page
@endsection



@section('body')
    <h1 class="text-center text-success">{{ session('message') }}</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title float-left pr-5">All Product Information</h4>
                    <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Product Name</th>
                            <th>Product Code</th>
                            <th>Selling Price</th>
                            <th>Product Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->code }}</td>
                                <td>{{ $product->selling_price }}</td>
                                <td> <img src="{{ asset($product->image) }}" alt="" height="100" width="120"></td>
                                <td>{{ $product->status == 1 ? 'Published' : ' Unpublished' }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('product.detail', [ 'id' => $product->id]) }}" class="btn btn-info btn-sm mr-1" title="product detail">
                                        <i class="fa fa-book-open"></i>
                                    </a>
                                    <a href="{{ route('product.edit', [ 'id' => $product->id]) }}" class="btn btn-success btn-sm mr-1" title="product edit">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('product.delete', [ 'id' => $product->id]) }}" method="POST" onsubmit="return confirm('are sure to delete...?')">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm" title="product delete">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>

{{--                                    <a href="{{ route('product.delete', [ 'id' => $product->id]) }}" class="btn btn-danger btn-sm" title="product delete" onclick="return confirm('Are you sure to delete...?');">--}}
{{--                                        <i class="fa fa-trash"></i>--}}
{{--                                    </a>--}}

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


