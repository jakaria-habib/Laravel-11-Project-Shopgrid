@extends('website.master')

@section('title')
    Customer Login
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
                    <h2>My Dashboard...</h2>
                </div>
            </div>
        </div>
    </div>

@endsection




