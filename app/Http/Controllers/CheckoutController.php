<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use ShoppingCart;
use Session;

class CheckoutController extends Controller
{
    private $customer, $order;

    public function index()
    {
        if(session()->get('customer_id'))
        {
            $this->customer = Customer::find(session()->get('customer_id'));
        }
        else
        {
            $this->customer = '';
        }
        return view('website.checkout.index', [ 'cart_products' => ShoppingCart::all(), 'customer' => $this->customer]);
    }

    public function newOrder(Request $request)
    {

        if(session()->get('customer_id'))
        {
            $this->customer = Customer::find(session()->get('customer_id'));
        }
        else
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|unique:customers,email',
                'mobile' => 'required|unique:customers,mobile',
                'delivery_address' => 'required',

            ],[

//          'name.required' => 'vai please name den',
            ]);

            $this->customer = Customer::newCustomer($request);
            session()->put('customer_id', $this->customer->id);
            session()->put('customer_name', $this->customer->name);

        }


        if($request->payment_type == 1)
        {
            $this->order = Order::newOrder($request, $this->customer->id);
            OrderDetail::newOrderDetail($this->order->id);
        }
        else
        {
            return  view('website.checkout.exampleHosted', [ 'customer' => $this->customer, 'address' => $request->delivery_address, 'cart_products' => ShoppingCart::all() ]);
        }

        session()->forget('coupon_amount');
//         session()->forget('shipping_cost');
        return redirect('/complete-order');



    }

    public function completeOrder()
    {
        return view('website.checkout.complete-order');
    }
















}
