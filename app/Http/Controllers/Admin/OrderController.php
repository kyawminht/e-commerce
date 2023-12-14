<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function index()
    {

        $orders=Order::paginate(5);
        return view('admin.order.index',compact('orders'));
    }

    public function show($orderId)
    {
        $order=Order::where('id',$orderId)->first();
        if ($order){
            return view('admin.order.view',compact('order'));
        }else{
            return redirect('admin/orders')->back()->with('message','No order found');
        }
    }

    public function viewInvoice($orderId)
    {
        $order=Order::findOrFail($orderId);
        return view('admin.order.view-invoice',compact('order'));
    }


    public function downloadInvoice($orderId)
    {
        $order=Order::findOrFail($orderId);
        $data=['order'=>$order];
        $pdf = Pdf::loadView('admin.order.view-invoice', $data);
        $todayDate=Carbon::now();
        return $pdf->download('invoice.'.$order->id.'-'.$todayDate.'..pdf');
    }

}
