@extends('admin.master')


@section('title')
    Manage Coupon Page
@endsection



@section('body')
    <h1 class="text-center text-success">{{ session('message') }}</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title float-left pr-5">All Coupon Information</h4>
                    <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Coupon Name</th>
                            <th>Discount Amount</th>
                            <th>Minimum Purchase Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($coupons as $coupon)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $coupon->name }}</td>
                                <td>{{ $coupon->amount }}</td>
                                <td>{{ $coupon->minimum_purchase_amount }}</td>
                                <td>{{ $coupon->status }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('coupon.edit', [ 'id' => $coupon->id]) }}" class="btn btn-success btn-sm mr-1">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form action="{{ route('coupon.delete', [ 'id' => $coupon->id ]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete...???');" >
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>

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

