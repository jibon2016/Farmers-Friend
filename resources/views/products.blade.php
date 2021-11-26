@extends('master')
@section('main-content')
<div class="page-content" id="content">
  <div class="card-deck p-4">
    <div class="row ">
    @foreach ($products as $product)
    <div class="col-md-3  py-2">
      <div class="overlay">
        <div class="card single-product">
          <a href="#"><img height="200" src="{{ asset('Product_image').'/'.$product->picture }}" class="card-img-top" alt="..."></a>
          <div class="card-body">
            <h5 class="card-title">{{$product->title }}</h5>
            <p class="text-center">{{ $product->cost_price.'.00'}} </p>
            {{-- <p class="card-text">{{ substr($product->description, 0,  100) }}</p> --}}
          </div>
        </div>
      </div>
      <div class="card-footer">
        <button class="btn btn-block">Order</button>
      </div>
    </div>
    @endforeach
    </div>
  </div>
</div>
@endsection