<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index ()
    {
        $this->data['orders'] = Order::all();
        return view('admin.orders.order', $this->data);
    }
}
