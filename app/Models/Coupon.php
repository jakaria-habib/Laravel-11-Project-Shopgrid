<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    private static $coupon;

    public static function createCoupon($request)
    {

        self::$coupon = new Coupon();
        self::$coupon->name          = $request->name;
        self::$coupon->amount          = $request->amount;
        self::$coupon->minimum_purchase_amount   = $request->minimum_purchase_amount;
        self::$coupon->save();

    }

    public static function updateCoupon($id, $request)
    {

        self::$coupon               = Coupon::find($id);
        self::$coupon->name         = $request->name;
        self::$coupon->amount         = $request->amount;
        self::$coupon->minimum_purchase_amount  = $request->minimum_purchase_amount;
        self::$coupon->save();

    }

    public static function deleteCoupon($id)
    {

        self::$coupon = Coupon::find($id);
        self::$coupon->delete();

    }












}
