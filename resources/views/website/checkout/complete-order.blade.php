@extends('website.master')

@section('title')
    Complete Order
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
                        <li>Complete order</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div>
                    <h3 class="text-success text-center">Congratulations...Your order successfully posted. Please wait, we will contact with you soon.</h3>
                </div>
            </div>
        </div>
    </section>



@endsection




