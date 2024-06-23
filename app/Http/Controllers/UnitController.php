<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{


    private $units, $unit;


    public function index()
    {

        return view('admin.unit.index');

    }

    public function create( Request $request)
    {

        Unit::createUnit($request);
        return redirect('/unit/manage')->with('message' , 'Unit Info Created Successfully');

    }

    public function manage()
    {
        $this->units = Unit::all();
        return view('admin.unit.manage', [ 'units' => $this->units]);

    }


    public function edit($id)
    {
        $this->unit = Unit::find($id);
        return view('admin.unit.edit', [ 'unit' => $this->unit] );

    }

    public function update(Request $request, $id)
    {

        Unit::updateUnit($id,$request);
        return redirect('/unit/manage')->with('message', 'Unit Info updated successfully.');

    }

    public function delete($id)
    {

        Unit::deleteUnit($id);
        return back()->with('message', 'Unit Deleted successfully. ');


    }



}
