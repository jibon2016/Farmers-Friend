<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Demand;
use Illuminate\Http\Request;

class DemandController extends Controller
{
    public function index ()
    {
        $this->data['demands'] = Demand::all();
        return view('admin.demands.offer', $this->data);
    }
}
