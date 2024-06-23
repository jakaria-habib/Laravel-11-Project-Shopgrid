<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>A simple, clean, and responsive HTML invoice template</title>

    <!-- Favicon -->
    <link rel="icon" href="./images/favicon.png" type="image/x-icon" />

    <!-- Invoice styling -->
    <style>
        body {
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            text-align: center;
            color: #777;
        }

        body h1 {
            font-weight: 300;
            margin-bottom: 0px;
            padding-bottom: 0px;
            color: #000;
        }

        body h3 {
            font-weight: 300;
            margin-top: 10px;
            margin-bottom: 20px;
            font-style: italic;
            color: #555;
        }

        body a {
            color: #06f;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <div class="invoice-box">
    <table>
        <tr class="top">
            <td colspan="12">
                <table>
                    <tr>
                        <td class="title">
                            <img src="{{ asset('/') }}website/assets/images/logo/logo.svg" alt="Company logo" style="width: 100%; max-width: 300px" />
                        </td>

                        <td>
                            Invoice #000{{ $order->id }}<br />
                            <strong>Order Date:</strong>{{ $order->order_date }}<br />
                            <strong>Delivery Date:</strong> {{ date('Y-m-d') }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="12">
                <table>
                    <tr>
                        <td>
                            <h4>Delivery Information</h4>
                            Name: {{ $order->customer->name }}<br/>
                            Email: {{ $order->customer->email }}<br/>
                            Mobile: {{ $order->customer->mobile }}<br/>
                            Address: {{ $order->delivery_address }}
                        </td>
                        <td>
                            <h4>Shopgrid Company</h4>
                            Acme Corp.<br />
                            John Doe<br />
                            john@example.com
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td colspan="4">Payment Method</td>
            <td >Check #</td>
        </tr>

        <tr class="details">
            <td colspan="4">{{ $order->payment_type == 1 ? 'Cash':'Online' }}</td>
            <td>{{ $order->payment_type == 1 ? 'Cash on Delivery':'Payment Gateway' }}</td>
        </tr>

        <tr class="heading">
            <td >SL NO</td>
            <td style="text-align: left">Item</td>
            <td style="text-align: center">Unit Price</td>
            <td style="text-align: center">Quantity</td>
            <td style="text-align: right">Total Price</td>
        </tr>
        @php($sum =0 )
        @foreach( $order->orderDetails as $orderDetail)
            <tr class="item">
                <td>{{ $loop->iteration }}</td>
                <td style="text-align: left">{{$orderDetail->product_name}}</td>
                <td style="text-align: center">{{$orderDetail->product_price}}</td>
                <td style="text-align: center">{{$orderDetail->product_qty}}</td>
                @php($total = $orderDetail->product_price * $orderDetail->product_qty)
                <td style="text-align: right">{{ $total }}</td>
            </tr>
            @php($sum = $sum + $total)
        @endforeach

        <tr class="total">
            <td colspan="4"></td>
            <td>Sub Total: {{number_format($sum)  }}</td>
        </tr>
        @php( $tax = $sum * 0.15 )
        <tr class="total">
            <td colspan="4"></td>
            <td>TAX ( 15% ): {{number_format($tax)  }}</td>
        </tr>
        @php( $shipping = 500 )
        <tr class="total">
            <td colspan="4"></td>
            <td>Shipping Cost : {{number_format($shipping)  }}</td>
        </tr>

        @if(session()->get('coupon_amount'))
            <tr class="total">
                <td colspan="4"></td>
                <td>Discount Amount : {{ session()->get('coupon_amount') }}</td>
            </tr>
            @php( $summation = $sum + $tax + $shipping - session()->get('coupon_amount') )
        @else
            @php( $summation = $sum + $tax + $shipping )
        @endif

        <tr class="total">
            <td colspan="4"></td>
            <td>Total Payable : {{number_format($summation)  }}</td>
        </tr>
    </table>
</div>

</body>
</html>

