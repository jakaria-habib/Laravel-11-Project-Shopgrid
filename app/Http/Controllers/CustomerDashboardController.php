<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class CustomerDashboardController extends Controller
{

    private $customer_detail, $orders;

    public function index()
    {
        return view('website.customer.index');
    }

    public function profile()
    {
//      return  Customer::find(session()->get('customer_id'));
        $customer_detail = Customer::find(session()->get('customer_id'));
//      return  $customer_detail;
        return view('website.customer.profile', [ 'customer' => $customer_detail]);
//      return view('website.customer.profile', [ 'customer' => Customer::find( session()->get('customer_id') )]);
    }

    public function updateProfile( Request $request)
    {

        Customer::updateCustomer($request);
        return back()->with('message', 'Profile info Update successfully.');

    }

    public function order()
    {
        return view('website.customer.order', [ 'orders' => Order::where('customer_id', session()->get('customer_id'))->get()]);
    }

    public function changePassword()
    {
        return view('website.customer.change-password');
    }




}
