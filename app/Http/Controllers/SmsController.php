<?php

namespace App\Http\Controllers;

use App\Model\User;
use App\Model\UserDocument;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SmsController extends Controller
{
    public function index()
    {
        if (Auth::user()->phone_verified_at == '') {
            return view('auth.verify');
        }
        return redirect()->route('home');
    }
    public function store(Request $request){
        
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        if ($user->remember_token == $request->otp) {
            $user->phone_verified_at = Carbon::now();
            $user->save();
            return redirect()->route('home');
        }else{
            return redirect()->back()->withErrors('OTP Does not match');;
        }
    }

    public function showDocument () {
        if (Auth::user()->user_type == "Seller") {
            $user_id = Auth::user()->id ;
            $user = User::findOrFail($user_id);
            if ($user->saller_flag == 0) {
                $upload = UserDocument::where('user_id', $user->id);
                if (isset($upload)) {
                    return redirect()->back()->withErrors("Your Id is Under Review");
                }else{
                    return view('auth.documentVerify');
                }
            }
            return redirect()->back()->withErrors("Your Id is Under Review");
        }else{
            return redirect()->back()->withErrors("Your ID is Not Seller Account!");
        }
    }

    public function StoreDocumet(Request $request){
        $request->validate([
            'nid_number' => 'required|numeric|digits:17',
            'nid_img' => 'required|image|mimes:jpg,jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user_id = Auth::user()->id ;
        $frmdata = $request->all();
        $frmdata['user_id'] = $user_id;
        if ($image = $request->file('nid_img')) {
            $destinationPath = 'Documents/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $frmdata['nid_img'] = "$profileImage";
        }
        if ( UserDocument::create($frmdata)){
            // $user = User::findOrFail($user_id);
            // $user->saller_flag = 1;
            // $user->save();
            return redirect()->intended();
        };

    }
}
