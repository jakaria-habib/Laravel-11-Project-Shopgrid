<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class AdminOrderController extends Controller
{
    private $order, $pdf;


    public function index()
    {
        return view('admin.order.index',[ 'orders' => Order::orderBy('id', 'desc')->get()]);
    }


    public function detail($id)
    {
        $this->order = Order::find($id);
        return view('admin.order.detail', [ 'order' => $this->order]);
    }


    public function edit($id)
    {
        return view('admin.order.edit',[ 'order' => Order::find($id)]);
    }

    public function update(Request $request)
    {
//        return $request->all();
        Order::updateOrderInfo($request);
        return redirect('/admin/manage-order')->with('message', 'Order status info update successfully.') ;

    }
    public function invoice($id)
    {
        return view('admin.order.invoice',['order' => Order::find($id)]);
    }

    public function downloadInvoice($id)
    {

        $pdf = Pdf::loadView('admin.order.download-invoice', ['order' => Order::find($id) ]);
        return $pdf->stream('invoice-00'.$id.'pdf');

//        return $id;
//        return view('admin.order.downloadInvoice');
    }

    public function delete($id)
    {
        Order::deleteOrder($id);
        return back()->with('message', 'Order deleted successfully.');
    }























}
