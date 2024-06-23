<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class EcommerceController extends Controller
{

    public $categories, $products;

    public function index()
    {

        $this->products = Product::orderBy('id','desc')->take(8)->get(['id','name','category_id','image','selling_price']);
        return view('website.home.index',
            [
            'products' => $this->products,
            ]);
    }

    public function categoryProduct($id)
    {
        $this->products = Product::where('category_id',$id)->orderBy('id', 'desc')->get(['id','name','category_id','image','selling_price']);
        return view('website.category.index', ['products'=>$this->products]);
    }

    public function productDetail($id)
    {

        return view('website.detail.index', ['product'=> Product::find($id)]);
    }


}
