@extends('website.master')

@section('title')
    Order Page
@endsection


@section('body')


    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Customer Dashboard</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('home') }}"><i class="lni lni-home"></i>Home</a></li>
                        <li>Customer Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="card card-body">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="{{ route('customer-dashboard') }}">My Dashboard</a></li>
                            <li class="list-group-item"><a href="{{ route('customer-profile') }}">My Profile</a></li>
                            <li class="list-group-item"><a href="{{ route('customer-order') }}">My Order</a></li>
                            <li class="list-group-item"><a href="">My Account</a></li>
                            <li class="list-group-item"><a href="">Change Password</a></li>
                        </ul>

                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="card card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>SL NO</th>
                                    <th>Order ID</th>
                                    <th>Order Date</th>
                                    <th>Order Status</th>
                                    <th>Total Amount (BDT)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->order_date }}</td>
                                    <td>{{ $order->order_status }}</td>
                                    <td>{{ $order->order_total }}</td>
                                    <td>
                                        <a href="" class="btn btn-success btn-sm">Detail</a>
                                        <a href="" class="btn btn-info btn-sm">Invoice</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection




