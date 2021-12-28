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
          <a href={{ route('product.order', ['slug' => $product->title]) }} class='btn btn-block btn-success text-white'>Order</a>
        </div>
      </div>
    @endforeach
@endsection
