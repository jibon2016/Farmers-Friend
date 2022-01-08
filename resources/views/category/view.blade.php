@extends('master')
@section('main-content')
    @foreach ($products as $product)
      <div class="col-md-3  py-3 float-left">
        <div class="product-top">
          <img src="{{ asset('').'Product_image/'. $product->picture}}" alt="">
          <a href="www.google.com">
            <div class="overlay">
              <h2>বিস্তারিত দেখুন>></h2>
            </div>
          </a>
        </div>
        <div class="product-bottom text-center">
          <h3>{{ $product->title }}</h3>
          <h5>tk.{{ $product->cost_price }}/-</h5>
        </div>
        <div class="order-btn">
          @guest
          <a href={{ route('login') }} class='btn btn-block btn-success text-white'>Order/Offer</a>
          @endguest
          @auth
            @if (Auth::user()->user_type == 'Saller')
            <a href={{ route('product.offer', ['slug' => $product->title]) }} class='btn btn-block btn-success text-white'>Offer</a>
            @endif
            @if (Auth::user()->user_type == 'Buyer')
            <a href={{ route('product.order', ['slug' => $product->title]) }} class='btn btn-block btn-success text-white'>Order</a>
            @endif
          @endauth
        </div>
      </div>
    @endforeach
@endsection
