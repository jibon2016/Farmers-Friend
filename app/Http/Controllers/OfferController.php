<?php

namespace App\Http\Controllers;

use App\Model\Demand;
use App\Model\Product;
use App\Model\UserDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class OfferController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($name)
    {
        if (Auth::user()->user_type == "Seller") {
            $upload = UserDocument::where('user_id', Auth::user()->id)->first();
            if (isset($upload)) {
                if(Auth::user()->saller_flag == 0 ){
                    return redirect()->back()->withErrors("Wait for your account Verification");
                }else{
                    $this->data['product'] = Product::where('title', '=' , $name)->first();
                    return view('offer.view',$this->data);
                    }
            }else{
                return view('auth.documentVerify');
            }
        }else{
            return redirect()->back()->withErrors("Your are not Seller");
        }
    }

    public function create(Request $request){
        $lastorderId = Demand::orderBy('id', 'desc')->first()->offer_no;
        // Get last 3 digits of last order id
        $lastIncreament = substr($lastorderId, -3);
        // Make a new order id with appending last increment + 1
        $newOrderId =   date('dmY') . str_pad($lastIncreament + 1, 3, 0, STR_PAD_LEFT);

        $frmdata = $request->all();
        $frmdata['offer_no'] = $newOrderId;
        $frmdata['status'] = "Processing";
        // return $frmdata;
        if ( $demand = Demand::create($frmdata) ) {
        // $phone = '88'.$data['phone'];
        // $code  = rand(11111,99999);
        $nexmo = app('Nexmo\Client');
        // if ($data['phone'] === '0185566205') {
            // $nexmo->message()->send([
            //     'to'   => '8801855669205',
            //     'from' => 'Fremers Friend',
            //     'text' => 'You are Successfully Place a Offer. Your Offer no. is'. $newOrderId
            // ]);
        // }
            return view('offer.sucess',['demand'=>$demand]);
        }
    }

    public function invoice($id){
        $this->data['offer'] = Demand::where('id', $id)->first();
        // PDF::loadView()->save('invoice.pdf');
        return PDF::loadView('offer.invoice', $this->data)->download( $this->data['offer']->offer_no.'_invoice.pdf');
    }

}
