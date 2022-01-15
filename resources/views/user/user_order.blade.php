@extends('master')
@section('main-content')
<div class="main-content">
  <h3 class="text-center py-3">User Order Details</h3>
  <div class=" mx-5">
    <div class="row">
      <div class="col-md-6">
        <p>Order No: <strong>#{{ $order->order_no }} </strong></p>
        <p>Quantity: {{ $order->quantity }} </p>
        <p>Unit: {{ $order->product_type }} </p>
        <p>Delivery Charge: {{ $order->delivery_charge }} </p>
        <p>Sub Total: {{ $order->amount - $order->delivery_charge }} </p>
        <p>Total: {{ $order->amount }} </p>
        <p>Payment Type: {{ $order->payment_type }} </p>
      </div>
      <div class="col-md-6">
        <p>Product Name: {{ $order->product->title }} </p>
        <p>User Name: {{ $order->user->name }} </p>
        <p>User District: {{ $order->user->district }} </p>
        <p>User Phone: 0{{ $order->user->phone }} </p>
      </div>
    </div>
    <div class="order-sucess mt-0 row justify-content-center align-items-center"> 
      <a type="submit" href="{{ route('user.invoice', ['id'=>$order->transaction_id]) }}" class="btn btn-primary mx-auto d-block">Download Invoice</a>
    </div>
  </div>
</div>
@endsection