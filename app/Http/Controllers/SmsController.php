<?php

namespace App\Http\Controllers;

use App\Model\User;
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
}
