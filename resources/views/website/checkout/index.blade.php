@extends('website.master')

@section('title')
    Checkout Page
@endsection


@section('body')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">checkout</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <h3 class="text-success text-center">{{ session('message') }}</h3>
    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="checkout-steps-form-style-1">
                        <ul id="accordionExample">
                            <li>
                                <h6 class="title" >Order Checkout Information </h6>
                                <section class="checkout-steps-form-content collapse show" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <form action="{{ route('new-order') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>Full Name<span class="text-danger">*</span></label>
                                                    <div class="row">
                                                        <div class="col-md-12 form-input form">
                                                            @if($customer)
                                                                <input type="text" name="name" value="{{ $customer->name }}" readonly placeholder="Full Name">
                                                            @else
                                                                <input type="text" name="name" value="" placeholder="Full Name">
                                                                <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : "" }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Email Address<span class="text-danger">*</span></label>
                                                    <div class="form-input form">
                                                        @if($customer)
                                                            <input type="text" name="email" value="{{ $customer->email }}" readonly placeholder="Email Address">
                                                        @else
                                                            <input type="text" name="email" placeholder="Email Address">
                                                            <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : "" }}</span>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Phone Number<span class="text-danger">*</span></label>
                                                    <div class="form-input form">
                                                        @if($customer)
                                                            <input type="text" value="{{ $customer->mobile }}" readonly name="mobile" placeholder="Phone Number">
                                                        @else
                                                            <input type="text" name="mobile" placeholder="Phone Number">
                                                            <span class="text-danger">{{ $errors->has('mobile') ? $errors->first('mobile') : "" }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>Delivery Address<span class="text-danger">*</span></label>
                                                    <div class="form-input form">
                                                        <textarea name="delivery_address" placeholder="Delivery Address"></textarea>
                                                        <span class="text-danger">{{ $errors->has('delivery_address') ? $errors->first('delivery_address') : "" }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Payment Type</label>
                                                    <div class="">
                                                        <label style="margin-right: 10px;"><input type="radio" name="payment_type" value="1" checked> <span style="margin-left: 3px;"> Cash on Delivery</span> </label>
                                                        <label><input type="radio" name="payment_type" value="2"><span style="margin-left: 5px;"> Online </span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form button">
                                                    <button type="submit" class="btn">Confirm Order</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </section>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-sidebar">
                        <div class="checkout-sidebar-price-table">
                            <h5 class="title">Shopping Cart Summary</h5>
                            <div class="sub-total-price">
                                @php( $sum =0 )

                                @foreach($cart_products as $cart_product)
                                    <div class="total-price">
                                        <p class="value">{{ $cart_product->name }} - ({{ $cart_product->price }} * {{ $cart_product->qty }})</p>
                                        <p class="price">{{ number_format($cart_product->total) }}</p>
                                    </div>
                                        @php( $sum = $sum + $cart_product->total )
                                @endforeach
                                <div class="total-price">
                                    <p class="value">TAX ( 15% ):</p>
                                    @php( $tax = $sum * 0.15 )
                                    <p class="price">{{ number_format($tax)}}</p>
                                </div>
                                <div class="total-price">
                                    <p class="value">Shipping Cost:</p>
                                    @php( $shipping_cost = 500 )
                                    <p class="price">{{ number_format($shipping_cost) }}</p>
                                </div>
                                @if( Session::get('coupon_amount'))
                                <div class="total-price">
                                    <p class="value">Discount Amount:</p>
                                    <p class="price">{{ number_format(session()->get('coupon_amount')) }}</p>
                                </div>
                                @php( $total =  ( $sum + $shipping_cost + $tax ) - session()->get('coupon_amount'))
                                @else
                                    @php( $total = $sum + $shipping_cost + $tax )
                                @endif
                            </div>

                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Total Payable:</p>
                                    <p class="price">{{ number_format( $total ) }}</p>
                                    <?php
                                        session()->put('order_total', $sum);
                                        session()->put('tax_amount', $tax);
                                        session()->put('shipping_cost', $shipping_cost);
                                        if(session()->get('coupon_amount'))
                                        {
                                            session()->put('coupon_amount',session()->get('coupon_amount'));
                                            session()->put('coupon_name',session()->get('coupon_name'));
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="checkout-sidebar-banner mt-30">
                            <a href="#">
                                <img src="{{ asset('/') }}website/assets/images/banner/banner.jpg" alt="#">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection




