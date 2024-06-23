
@extends('admin.master')


@section('title')
    Add Coupon Page
@endsection



@section('body')

    <h1 class="text-center text-success">{{ session('message')}}</h1>

    <div class="row">

        <div class="col-lg-10 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title mb-4">Add Coupon Form</h1>

                    <form action="{{ route('coupon.create') }}" method="POST">
                        @csrf
                        <div class="form-group row mb-4">
                            <label for="" class="col-sm-3 col-form-label">Coupon Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" id="">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="" class="col-sm-3 col-form-label">Discount Amount</label>
                            <div class="col-sm-9">
                                <textarea name="amount" class="form-control" id=""></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Minimum Purchase Amount</label>
                            <div class="col-sm-9">
                                <textarea name="minimum_purchase_amount" class="form-control" id=""></textarea>
                            </div>
                        </div>
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Create New Coupon</button>
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

