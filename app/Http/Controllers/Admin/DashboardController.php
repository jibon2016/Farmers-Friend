<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Demand;
use App\Model\Order;
use App\Model\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index()
  {
    $this->data['orders'] = Order::all();
    $this->data['demands'] = Demand::all();
    $this->data['users'] = User::where('saller_flag', 0)->where('user_type','seller')->get();
      return view('admin.dashboard', $this->data);
  }
}
