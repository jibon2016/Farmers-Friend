@extends('master')
@section('main-content')
<div class="page-content" id="content">
  <div class="row">
    @foreach ($products as $product)
      <div class="col-md-3  py-3">
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
          <h5>${{ $product->cost_price }}</h5>
        </div>
        <div class="order-btn">
          <button class="btn btn-block btn-success">Order</button>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection