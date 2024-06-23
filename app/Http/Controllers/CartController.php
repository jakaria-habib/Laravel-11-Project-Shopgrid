<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;
use ShoppingCart;
use Session;

class CartController extends Controller
{
    private  $categories, $product, $cartProduct, $coupon;

    public function addToCart(Request $request, $id)
    {

        $this->product = Product::find($id);
        if($this->product->stock_amount >= $request->qty)
        {
            ShoppingCart::add($this->product->id,$this->product->name, $request->qty, $this->product->selling_price, ['image' => $this->product->image, 'category_name' => $this->product->category->name, 'brand_name'=>$this->product->brand->name ]);
            return redirect('/show-cart');
        }
        return back()->with('message','Sorry... You can purchase maximum '.$this->product->stock_amount.' pieces');

    }


    public function show()
    {

//        return ShoppingCart::all();
//        session()->forget('coupon_amount');
        return view('website.cart.index', ['cart_products' => ShoppingCart::all()]);

    }

    public function remove($id)
    {
        ShoppingCart::remove($id);
        return back()->with('message', 'Product Removed Successfully.');

    }

    public function update(Request $request, $id)
    {
        $this->cartProduct= ShoppingCart::get($id);
        $this->product = Product::find($this->cartProduct->id);
        if($this->product->stock_amount >= $request->qty)
        {
            ShoppingCart::update($id, $request->qty);
            return back()->with('message', 'Product Updated Successfully.');
        }
        return back()->with('message', 'Sorry.. You can purchase maximum '.$this->product->stock_amount.' pieces');

    }


    public function applyCoupon(Request $request)
    {

         $this->coupon = Coupon::where('name',$request->coupon)->first();
//         echo "<pre>";print_r($this->coupon);exit;
         if($this->coupon)
         {
             if($this->coupon->status == 1)
             {
                 return back()->with('message', 'Coupon already used.');
             }
             $sum = 0;
             foreach (ShoppingCart::all() as $item)
             {
                 $sum = $sum + $item->total;
             }

             $tax = round($sum * 0.15 );
             $shipping = 500 ;
             $totalBill = $sum + $tax + $shipping;
//           echo $totalBill."--".$this->coupon->minimun_purchase_amount;exit;
             if( $totalBill >= $this->coupon['minimum_purchase_amount']  )
             {
                 $this->coupon->status = 1;
                 $this->coupon->save();

                 $request->session()->put('coupon_amount', $this->coupon->amount);
                 $request->session()->put('coupon_name', $this->coupon->name);

                 return back()->with('message', 'Coupon applied successfully.');
             }
             return back()->with('message', 'For Coupon apply minimum purchase should be 5000TK '.$this->coupon->minimun_purchase_amount );
         }
         return back()->with('message', 'Coupon code is wrong');


    }



















}
