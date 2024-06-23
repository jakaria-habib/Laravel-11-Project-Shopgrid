@extends('admin.master')


@section('title')
    Manage Category Page
@endsection



@section('body')
    <h1 class="text-center text-success">{{ session('message') }}</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title float-left pr-5">All Order Information</h4>
                    <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Order ID</th>
                            <th>Customer Info</th>
                            <th>Order Date</th>
                            <th>Order Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->customer->name.' ( '.$order->customer->mobile.' ) ' }}</td>
                                <td>{{ $order->order_date }}</td>
                                <td>{{ $order->order_status }}</td>
                                <td>
                                    <a href="{{ route('admin.order-detail', [ 'id' => $order->id]) }}" class="btn btn-info btn-sm" title="Order Detail">
                                        <i class="fa fa-book-open"></i>
                                    </a>
                                    <a href="{{ route('admin.order-edit', [ 'id' => $order->id]) }}" class="btn btn-primary btn-sm" title="Order Edit">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ route('admin.order-invoice', [ 'id' => $order->id]) }}" class="btn btn-success btn-sm" title="Order Invoice">
                                        <i class="fa fa-file"></i>
                                    </a>
                                    <a href="{{ route('admin.download-order-invoice', [ 'id' => $order->id]) }}" class="btn btn-warning btn-sm" title="Download Invoice">
                                        <i class="fa fa-download"></i>
                                    </a>
                                    <a href="{{ route('admin.order-delete', [ 'id' => $order->id]) }}" class="btn btn-danger btn-sm {{ $order->order_status == 'Cancel' ? '': 'disabled' }}" onclick="return confirm('Are you sure to delete...?');" title="Order Delete">
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

