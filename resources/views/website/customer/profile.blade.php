@extends('website.master')

@section('title')
    My Profile
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

    <h2 class="text-success text-center">{{ session('message') }}</h2>

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
                        <form action="{{ route('update-customer-profile') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-3 mx-auto">
                                    @if($customer->image)
                                        <img src="{{ asset( $customer->image ) }}" alt="" height="100" width="130"/>
                                    @else
                                        <img src="{{asset('/')}}download/avatar.png" alt="" height="100" width="130"/>
                                    @endif
                                    <input type="file" name="image" class="form-control-file mt-1"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Full Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="name" value="{{ $customer->name }}" class="form-control" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Email Address</label>
                                <div class="col-md-9">
                                    <input type="email"  name="email" value="{{ $customer->email }}" class="form-control" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Mobile Number</label>
                                <div class="col-md-9">
                                    <input type="number" name="mobile" value="{{ $customer->mobile }}" class="form-control" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">National ID</label>
                                <div class="col-md-9">
                                    <input type="number" name="nid" value="{{ $customer->nid }}" class="form-control" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Mailing Address</label>
                                <div class="col-md-9">
                                    <textarea type="text"  class="form-control" name="address">{{ $customer->address }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Date of Birth</label>
                                <div class="col-md-9">
                                    <input type="date" name="date_of_birth" value="{{ $customer->date_of_birth }}" class="form-control" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Blood Group</label>
                                <div class="col-md-9">
                                    <input type="text" name="blood_group" value="{{ $customer->blood_group }}" class="form-control" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3"></label>
                                <div class="col-md-9">
                                    <button type="submit" name="" class="btn btn-success">Update Information</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection




