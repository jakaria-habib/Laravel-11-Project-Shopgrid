@extends('website.master')


@section('title')

    Add to Cart Page

@endsection


@section('body')


    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Cart</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <h3 class="text-success text-center">{{ session('message') }}</h3>
    <div class="shopping-cart section">
        <div class="container">
            <div class="cart-list-head">

                <div class="cart-list-title">
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-12">
                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <p>Product Name</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Quantity</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Unit Price</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Total</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <p>Remove</p>
                        </div>
                    </div>
                </div>
                @php($sum = 0)
                @foreach($cart_products as $cart_product)
                <div class="cart-single-list">
                    <div class="row align-items-center">
                        <div class="col-lg-1 col-md-1 col-12">
                            <a href=""><img src="{{ asset($cart_product->image) }}" alt="#"></a>
                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <h3 class="product-name"><a href="">{{ $cart_product->name }}</a></h3>
                            <p class="product-des">
                                <span><em>Category:</em> {{ $cart_product->category_name }}</span>
                                <span><em>Brand:</em> {{ $cart_product->brand_name }}</span>
                            </p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <div class="count-input">
                                    <form action="{{ route('update-cart-product',['id' => $cart_product->__raw_id]) }}" method="POST">
                                        @csrf
                                        <div class="input-group">
                                            <input type="number" name="qty" class="form-control" value="{{ $cart_product->qty }}" min="1" />
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </div>
                                    </form>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>{{ $cart_product->price }}</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>{{ $cart_product->total }}</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <a class="remove-item" href="{{ route('remove-cart-product',['id' => $cart_product->__raw_id]) }}" onclick="return confirm('Are you sure to delete...?');" ><i class="lni lni-close"></i></a>
                        </div>
                    </div>
                </div>
                @php ( $sum = $sum + $cart_product->total )
                @endforeach

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-6 col-12">
                                <div class="left">
                                    <div class="coupon">
                                        <form action="{{ route('apply-coupon') }}" method="POST">
                                            @csrf
                                            <input name="coupon" type="text" placeholder="Enter Your Coupon">
                                            <div class="button">
                                                <button type="submit" class="btn">Apply Coupon</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="right">
                                    <ul>
                                        <li>Cart Subtotal<span> {{ number_format($sum) }}</span></li>

                                        @php( $tax = round($sum * 0.15) )
                                        <li>Tax Amount (15%)<span> {{ number_format($tax )}}</span></li>

                                        @php( $shipping = 500 )
                                        <li>Shipping Cost<span>{{ number_format($shipping) }}</span></li>

                                        @php( $totalBill = $sum + $tax + $shipping )
                                        <li>Total Bill<span>{{ number_format( $totalBill ) }}</span></li>

                                        @if( session()->get('coupon_amount'))
                                        <li>Discount Amount<span>{{ session()->get('coupon_amount') }}</span></li>
                                        <li>Total Payable<span>{{ number_format($totalBill - session()->get('coupon_amount')) }}</span></li>
                                        @endif
                                    </ul>
                                    <div class="button">
                                        <a href="{{ route('checkout') }}" class="btn">Checkout</a>
                                        <a href="" class="btn btn-alt">Continue shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
