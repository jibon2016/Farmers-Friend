@extends('master')
@section('main-content')
<div class="main-content">
  <h3 class="text-center py-3">User Offer Details</h3>
  <div class=" mx-5">
    <div class="row">
      <div class="col-md-6">
        <p>Order No: <strong>#{{ $offer->offer_no }} </strong></p>
        <p>Quantity: {{ $offer->quantity }} </p>
        <p>Unit: {{ $offer->product_type }} </p>
        <p>Delivery Charge: {{ $offer->delivery_charge }} </p>
        <p>Sub Total: {{ $offer->amount - $offer->delivery_charge }} </p>
        <p>Total: {{ $offer->amount }} </p>
      </div>
      <div class="col-md-6">
        <p>Product Name: {{ $offer->product->title }} </p>
        <p>User Name: {{ $offer->user->name }} </p>
        <p>User District: {{ $offer->user->district }} </p>
        <p>User Phone: 0{{ $offer->user->phone }} </p>
      </div>
    </div>
    <div class="order-sucess mt-0 row justify-content-center align-items-center"> 
      <a type="submit" href="{{ route('offer.invoice', ['id'=>$offer->id]) }}" class="btn btn-primary mx-auto d-block">Download Invoice</a>
    </div>
  </div>
</div>
@endsection