@extends('master')
@section('main-content')
<div class="main-content">
    {{-- @if (!Auth::check()) --}}
    <!-- Modal For Login -->
    <h5 class="p-4 text-center">Verify Phone Number</h5>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form autocomplete="off" method="POST" action="{{ url('verify')}}">
        @csrf
        <div class="row justify-content-center px-2">
            <div class="form-group col-md-8 row py-3">
                <label for="inputEmail3" class="col-sm-3 col-form-label">OTP Code:</label>
                <div class="col-sm-9">
                    <input type="number" name="otp" class="form-control" id="inputEmail3" placeholder="e.g. 12345">
                </div>
            </div>
        </div>
        <div class="text-center px-5">
            <button type="submit" class="btn btn-success">Verify</button>
        </div>
    </form>
    {{-- @endif --}}
</div>
@endsection














{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
