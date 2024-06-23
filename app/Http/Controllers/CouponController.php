<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{

    private $coupons, $coupon;


    public function index()
    {

        return view('admin.coupon.index');

    }

    public function create( Request $request)
    {

        Coupon::createCoupon($request);
        return redirect('/coupon/manage')->with('message' , 'Coupon Info Created Successfully');

    }

    public function manage()
    {
        $this->coupons = Coupon::all();
        return view('admin.coupon.manage', [ 'coupons' => $this->coupons]);

    }


    public function edit($id)
    {
        $this->coupon = Coupon::find($id);
        return view('admin.coupon.edit', [ 'coupon' => $this->coupon] );

    }

    public function update(Request $request, $id)
    {

        Coupon::updateCoupon($id,$request);
        return redirect('/coupon/manage')->with('message', 'Coupon Info updated successfully.');

    }

    public function delete($id)
    {

        Coupon::deleteCoupon($id);
        return back()->with('message', 'Coupon Deleted successfully. ');


    }



}
