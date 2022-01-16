<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index ()
    {
        $this->data['orders'] = Order::orderBy('id','DESC')->get();
        return view('admin.orders.order', $this->data);
    }

    public function show($id){
        $this->data['order'] = Order::where('id', $id)->first();
        return view('admin.orders.view', $this->data);
    }

    public function approve($id){
        $update = DB::table('orders')
        ->where('id',$id)
        ->update(['admin_approve'=> 1]);
        if ($update) {
            toastr()->success('Orders Data Updated');
            return redirect()->route('admin.orders');
        }else{
            toastr()->warning('Orders Data not Updated');
            return redirect()->route('admin.orders');
        }
    }

    public function destroy(){
        toastr()->warning('Order is Not Delected');
        return redirect()->back();
    }
}
