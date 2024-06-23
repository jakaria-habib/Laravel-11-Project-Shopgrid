@extends('admin.master')


@section('title')
    Product Detail Page
@endsection



@section('body')
    <h1 class="text-center text-success">{{ session('message') }}</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title float-left pr-5">Product Detail Information</h4>
                    <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                        <tr>
                            <th>Product ID</th>
                            <td>{{ $product->id }}</td>
                        </tr>
                        <tr>
                            <th>Category Name</th>
                            <td>{{ $product->category->name }}</td>
                        </tr>
                        <tr>
                            <th>Sub Category Name</th>
                            <td>{{ $product->subCategory->name }}</td>
                        </tr>
                        <tr>
                            <th>Brand Name</th>
                            <td>{{ $product->brand->name }}</td>
                        </tr>
                        <tr>
                            <th>Unit Name</th>
                            <td>{{ $product->unit->name }}</td>
                        </tr>
                        <tr>
                            <th>Product Name</th>
                            <td>{{ $product->name }}</td>
                        </tr><tr>
                            <th>Product Code</th>
                            <td>{{ $product->code }}</td>
                        </tr>
                        <tr>
                            <th>Product SLug</th>
                            <td>{{ $product->slug }}</td>
                        </tr>
                        <tr>
                            <th>Product Regular Price</th>
                            <td>{{ $product->regular_price }}</td>
                        </tr>
                        <tr>
                            <th>Product Selling Price</th>
                            <td>{{ $product->selling_price }}</td>
                        </tr>
                        <tr>
                            <th>Product Stock Amount</th>
                            <td>{{ $product->stock_amount }}</td>
                        </tr>
                        <tr>
                            <th>Product Short Description</th>
                            <td>{{ $product->short_description }}</td>
                        </tr>
                        <tr>
                            <th>Product Long Description</th>
                            <td>{!! $product->long_description !!}</td>
                        </tr>
                        <tr>
                            <th>Product Image</th>
                            <td><img src="{{ asset( $product->image) }}" alt="" height="80" width="110"></td>
                        </tr>
                        <tr>
                            <th>Product Other Images</th>
                            <td>
                                @foreach($product->otherImages as $otherImage)
                                <img src="{{ asset($otherImage->image) }}" alt="" height="80" width="110" >
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>Product Hit Count</th>
                            <td>{{ $product->hit_count }}</td>
                        </tr>
                        <tr>
                            <th>Product Sales Count </th>
                            <td>{{ $product->sales_count }}</td>
                        </tr>
                        <tr>
                            <th>Product Featured Status</th>
                            <td>{{ $product-> featured_status}}</td>
                        </tr>
                        <tr>
                            <th>Product Status</th>
                            <td>{{ $product->status }}</td>
                        </tr>

                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->



@endsection


