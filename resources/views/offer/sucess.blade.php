@extends('master')
@section('main-content')
  <div class="main-content">
    <h2 class="text-center pt-5">Offer Place is successfully Completed</h2>
    {{-- <h3>{{$demand->id}}</h3> --}}
    <div class="order-sucess row justify-content-center align-items-center"> 
      <a type="submit" href="{{ route('offer.invoice', ['id'=>$demand->id]) }}" class="btn btn-primary mx-auto d-block">Download Invoice</a>
      <a type="submit" href="{{ route('home') }}" class="btn btn-primary mx-auto d-block">Home</a>
  </div>
  </div>
@endsection