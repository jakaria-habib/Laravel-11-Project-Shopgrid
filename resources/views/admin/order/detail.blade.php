@extends('admin.master')


@section('title')
    Manage Category Page
@endsection



@section('body')


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title float-left pr-5">Order Basic Information</h4>
                    <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                        <tr>
                            <th>Order No</th>
                            <td>{{ $order->id }}</td>
                        </tr>
                        <tr>
                            <th>Order Date</th>
                            <td>{{ $order->order_date }}</td>
                        </tr>
                        <tr>
                            <th>Order Status</th>
                            <td>{{ $order->order_status }}</td>
                        </tr>
                        <tr>
                            <th>Customer Info</th>
                            <td>{{ $order->customer->name.' ( ' .$order->customer->mobile.' )' }}</td>
                        </tr>
                        <tr>
                            <th>Order Total</th>
                            <td>{{ $order->order_total }}</td>
                        </tr>
                        <tr>
                            <th>Tax Amount</th>
                            <td>{{ $order->tax_amount }}</td>
                        </tr>
                        <tr>
                            <th>Shipping Cost</th>
                            <td>{{ $order->shipping_amount }}</td>
                        </tr>
                        <tr>
                            <th>Coupon Name</th>
                            <td>{{ $order->coupon_name }}</td>
                        </tr>
                        <tr>
                            <th>Discount Amount</th>
                            <td>{{ $order->discount_amount }}</td>
                        </tr>
                        <tr>
                            <th>Payment Type</th>
                            <td>{{ $order->payment_type == 1 ? 'Cash On Delivery' : ' Online ' }} </td>
                        </tr>
                        <tr>
                            <th>Payment Status</th>
                            <td>{{ $order->payment_status}}</td>
                        </tr>
                        <tr>
                            <th>Delivery Status</th>
                            <td>{{ $order->delivery_status }}</td>
                        </tr>
                        <tr>
                            <th>Delivery Address</th>
                            <td>{{ $order->delivery_address }}</td>
                        </tr>
                        <tr>
                            <th>Currency</th>
                            <td>{{ $order->currency }}</td>
                        </tr>
                        <tr>
                            <th>Transaction ID</th>
                            <td>{{ $order->transaction_id }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title float-left pr-5">Order Product Information</h4>
                    <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
{{--                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive-nowrap"></table>--}}
                        <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Product Name</th>
                            <th>Unit Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($order->orderDetails as $orderDetail)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $orderDetail->product_name }}</td>
                                <td>{{ $orderDetail->product_price }}</td>
                                <td>{{ $orderDetail->product_qty }}</td>
                                <td>{{ $orderDetail->product_price * $orderDetail->product_qty }}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div>



@endsection

