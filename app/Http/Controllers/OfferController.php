<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($name)
    {
        if (Auth::user()->user_type == "Saller") {
            if(Auth::user()->saller_flag == 0 ){
                return redirect()->route('document.verify');
            }else{
                $this->data['product'] = Product::where('title', '=' , $name)->first();
                return view('offer.view',$this->data);
            }
        }else{
            return redirect()->back()->withErrors("Your ID is Not Seller Account!");
        }
    }

}
