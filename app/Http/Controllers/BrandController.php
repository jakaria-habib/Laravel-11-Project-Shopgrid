<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    private $brands, $brand;


    public function index()
    {

        return view('admin.brand.index');

    }

    public function create( Request $request)
    {

        Brand::createBrand($request);
        return redirect('/brand/manage')->with('message' , 'Brand Info Created Successfully');

    }

    public function manage()
    {
        $this->brands = Brand::all();
        return view('admin.brand.manage', [ 'brands' => $this->brands]);

    }


    public function edit($id)
    {
        $this->brand = Brand::find($id);
        return view('admin.brand.edit', [ 'brand' => $this->brand] );

    }

    public function update(Request $request, $id)
    {

        Brand::updateBrand($id,$request);
        return redirect('/brand/manage')->with('message', 'Brand Info updated successfully.');

    }

    public function delete($id)
    {

        Brand::deleteBrand($id);
        return back()->with('message', 'Brand Deleted successfully. ');


    }




}
