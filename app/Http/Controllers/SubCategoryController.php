<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{

    private $subCategories,$subCategory, $categories;

    public function index()
    {
        $this->categories = Category::all();
        return view('admin.sub-category.index', [ 'categories' => $this->categories ]);
    }



    public function create(Request $request)
    {
        SubCategory::newSubCategory($request);
        return back()->with('message', 'Congratulations...! Sub Category Info created successfully.');
//        return redirect('/sub-category/manage')->with('message', 'Congratulations...! Sub Category Info created successfully.');

    }


    public function manage()
    {
        $this->subCategories = SubCategory::all();
        return view('admin.sub-category.manage', ['subCategories' => $this->subCategories]);

    }

    public function edit($id)
    {
        $this->categories = Category::all();

         $this->subCategory = SubCategory::find($id);
        return view('admin.sub-category.edit', [
            'subCategory' => $this->subCategory,
            'categories' => $this->categories
        ]);
    }


    public function update(Request $request, $id)
    {
//        return $request->all();
        SubCategory::updateSubCategory($id, $request);

        return redirect('/sub-category/manage')->with('message', 'Sub Category Info Updated successfully');

    }

    public function delete($id)
    {

        SubCategory::deleteSubCategory($id);
        return back()->with('message','Congratulations...! Deleted successfully.');

    }





}
