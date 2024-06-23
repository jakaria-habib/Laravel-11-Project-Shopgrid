@extends('admin.master')


@section('title')
    Order Edit Page
@endsection



@section('body')

    <h1 class="text-center text-success">{{ session('message')}}</h1>

    <div class="row">

        <div class="col-lg-10 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title mb-4">Order Edit Form</h1>

                    <form action="{{ route('admin.order-update') }}" method="POST">
                        @csrf
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Order ID</label>
                            <div class="col-sm-9">
                                <input type="text" name="id" value="{{ $order->id }}" readonly class="form-control" >
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Order Total</label>
                            <div class="col-sm-9">
                                <input type="text" name="order_total" value="{{ $order->order_total }}" readonly class="form-control" >
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Customer Info</label>
                            <div class="col-sm-9">
                                <input type="text" name="customer_info" value="{{ $order->customer->name." ( ". $order->customer->mobile." )" }}" readonly class="form-control" >
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Delivery Address</label>
                            <div class="col-sm-9">
                                <textarea name="delivery_address" class="form-control" id="horizontal-email-input">{{ $order->delivery_address }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="" class="col-sm-3 col-form-label">Order Status</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="order_status" required>
                                    <option value="" selected disabled>--Select Order Status--</option>
                                    <option value="Pending" {{ $order->order_status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="Processing" {{ $order->order_status == 'Processing' ? 'selected' : '' }}>Processing</option>
                                    <option value="Complete" {{ $order->order_status == 'Complete' ? 'selected' : '' }}>Complete</option>
                                    <option value="Cancel" {{ $order->order_status == 'Cancel' ? 'selected' : '' }}>Cancel</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Update Order Information</button>
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

