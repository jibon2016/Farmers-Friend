<?php

namespace App\Http\Controllers;

use App\Model\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use PDF;

class InvoiceController extends Controller
{
    public function index ($tran_id){

        $this->data['order'] = Order::where('transaction_id', $tran_id)->first();
        // PDF::loadView()->save('invoice.pdf');
        return PDF::loadView('order.invoice', $this->data)->download( $this->data['order']->order_no.'_invoice.pdf');
        // return PDF::loadView('order.invoice', $this->data)->stream('invoice.pdf');
        // return $pdf->save('invoice.pdf');
        // return view('order.invoice', $this->data);
    }
}
