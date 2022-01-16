@extends('master')
@section('main-content')
    @foreach ($orders as $order)
      <div class="col-md-3  py-3 float-left">
        <div class="product-top">
          <img src="{{ asset('').'Product_image/'. $order->product->picture}}" alt="">
          <a href="www.google.com">
            <div class="overlay">
              <h2>বিস্তারিত দেখুন>></h2>
            </div>
          </a>
        </div>
        <div class="product-bottom p-2">
          <h3 class="text-left">{{ $order->product->title }}</h3>
          <span class="text-left">{{ $order->quantity.$order->product_type }}</span>
          <span class="float-right">{{ $order->user->district }}</span>
        </div>
        <div class="order-btn">
          @auth
            @if (Auth::user()->user_type == 'Seller')
            <form action="{{ route('order.confirm') }}" method="POST">
              @csrf
              <input type="hidden" value="{{$order->quantity}}" name="quantity">
              <input type="hidden" value="{{$order->product_type}}" name="product_type">
              <input type="hidden" value="{{$order->sub_total}}" name="sub_total">
              <input type="hidden" value="{{$order->delivery_charge}}" name="delivery_charge">
              <input type="hidden" value="{{$order->amount}}" name="amount">
              <input type="hidden" value="{{$order->product->id}}" name="product_id">
              <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
              <input type="hidden" value="{{ $order->id }}" name="order_id">
              <button type="submit" class='btn btn-block btn-success text-white'>Confirm Order</button>
            </form>
            @endif
            @if (Auth::user()->user_type == 'Buyer')
            <a href={{ route('order.order', ['slug' => $order->title]) }} class='btn btn-block btn-success text-white'>order</a>
            @endif
          @endauth
        </div>
      </div>
    @endforeach
@endsection
