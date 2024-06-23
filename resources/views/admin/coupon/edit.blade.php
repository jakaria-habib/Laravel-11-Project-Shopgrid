
@extends('admin.master')


@section('title')
    Edit Coupon Page
@endsection



@section('body')


    <h1 class="text-center text-success">{{ session('message')}}</h1>

    <div class="row">

        <div class="col-lg-10 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title mb-4">Edit Coupon Form</h1>

                    <form action="{{ route('coupon.update',[ 'id' => $coupon->id ]) }}" method="POST">
                        @csrf
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Coupon Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" value="{{ $coupon->name }}" class="form-control" id="horizontal-firstname-input">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Discount Amount</label>
                            <div class="col-sm-9">
                                <input type="text" name="amount" value="{{ $coupon->amount }}" class="form-control" id="horizontal-firstname-input">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Minimum Purchase Amount</label>
                            <div class="col-sm-9">
                                <textarea name="minimum_purchase_amount" class="form-control" id="horizontal-email-input">{{ $coupon->minimum_purchase_amount }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Edit Coupon Info</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- end row -->


@endsection

