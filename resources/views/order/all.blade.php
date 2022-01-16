@extends('master')
@section('main-content')
    @foreach ($offers as $offer)
      <div class="col-md-3  py-3 float-left">
        <div class="product-top">
          <img src="{{ asset('').'Product_image/'. $offer->product->picture}}" alt="">
          <a href="www.google.com">
            <div class="overlay">
              <h2>বিস্তারিত দেখুন>></h2>
            </div>
          </a>
        </div>
        <div class="product-bottom p-2">
          <h3 class="text-left">{{ $offer->product->title }}</h3>
          <span class="text-left">{{ $offer->quantity.$offer->product_type }}</span>
          <span class="float-right">{{ $offer->user->district }}</span>
        </div>
        <div class="order-btn">
          @auth
            @if (Auth::user()->user_type == 'Seller')
            <a href={{ route('order.offer', ['slug' => $order->title]) }} class='btn btn-block btn-success text-white'>Offer</a>
            @endif
            @if (Auth::user()->user_type == 'Buyer')
            <form action="{{ url('/checkout') }}" method="POST">
              @csrf
              <input type="hidden" value="{{$offer->quantity}}" name="product_quantity">
              <input type="hidden" value="{{$offer->product_type}}" name="product_unit">
              <input type="hidden" value="{{$offer->sub_total}}" name="product_total">
              <input type="hidden" value="{{$offer->delivery_charge}}" name="delivery_charge">
              <input type="hidden" value="{{$offer->amount}}" name="order_total">
              <input type="hidden" value="{{$offer->product->id}}" name="product_id">
              <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
              <button type="submit" class='btn btn-block btn-success text-white'>Order</button>
            </form>
            @endif
          @endauth
        </div>
      </div>
    @endforeach
@endsection
