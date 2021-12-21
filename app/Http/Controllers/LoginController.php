<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{


    // public function index()
    // {
    //     return view('admin.login');
    // }




    // public function authenticate(LoginRequest $request)
    // {
    //     $formData = $request->only('email','password');

    //     // $formData['password'] = Hash::make($formData['password']);

    //     // return $formData;

    //     if (Auth::attempt($formData)){
    //         return redirect()->route('dashboard');
    //     }else{
    //         return redirect()->route('login')->withErrors('Invalid Email and Password');
    //     }
    // }



    // public function logout()
    // {
    //     Auth::logout();
    //     return redirect()->route('login');
    // }

}
