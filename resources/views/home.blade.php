@extends('master')
@section('main-content')
  <div class="main-content">
    <div class="banner">
      <div class="img">
        <div class="banner-content">
          <h3>আপনার পন্য খুজুন এখানে</h3>
          <form class="banner_input border">
            <div class="input-group ">
              <input type="text" class="form-control  border-0" id="inputSearch" placeholder="পণ্য খুঁজুন (যেমন: পেঁয়াজ, চাল, আলু)" >
              <div class="input-group-append">
                <button class="btn bg-transparent" type="button">
                  <i class="fas fa-search"></i>
                </button>
              </div>
              </input>
            </div>
          </form> 
        </div>
      </div>      
    </div>
    <div class="mini-banner">
      <div class="mini-b-full">
        <div class="single-img">
          <img src="{{ asset('assets/img/mini-banner-1.jpg') }}">
        </div>
        <div class="single-img">
          <img src="{{ asset('assets/img/mini-banner-2.jpg') }}">
        </div>
      </div>
    </div>
    <div class="main-category">
      <div class="category-heading text-center">
        <h2>আমাদের পণ্যের বিভাগ সমূহ</h2>
      </div>
      <div class="container pb-5">
        <div class="row justify-content-start">
          @foreach ($categories as $category )
            <div class="col-lg-4 col-md-4 text-center">
              <div class="product">
                <div class="product-name">
                {{ $category->title}}
                  <i class=" product-icon {{ $category->category_icon }}"></i>
                </div>
              </div>
            </div>
          @endforeach
          </div>
        </div>
      </div>  
    </div>
  </div>
@endsection