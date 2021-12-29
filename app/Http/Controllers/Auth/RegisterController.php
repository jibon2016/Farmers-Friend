<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Model\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'verify';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'      => ['required', 'string', 'max:255'],
            'phone'     => ['required','numeric','digits:11','unique:users'],
            'password'  => ['required', 'string', 'min:8', ],
            'district'  => ['required', 'string', 'max:255', ],
            'user_type' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $phone = '88'.$data['phone'];
        $code  = rand(11111,99999);
        $nexmo = app('Nexmo\Client');
        $nexmo->message()->send([
            'to'   => $phone,
            'from' => 'Fremers Friend',
            'text' => 'OTP Code are:'. $code
        ]);

        return User::create([
            'name'              => $data['name'],
            'phone'             => $data['phone'],
            'password'          => Hash::make($data['password']),
            'district'          => $data['district'],
            'user_type'         => $data['user_type'],
            'remember_token'    => $code,
        ]);
    }
}
