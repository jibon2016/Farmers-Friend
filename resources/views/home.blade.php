@extends('master')
@section('main-content')
<div class="page-content" id="content">
  <div class="main-content">
    <div class="banner">
      <div class="img">
        <div class="banner-content">
          <h3>আপনার পন্য খুজুন এখানে</h3>
          <form class="banner_input border">
            <div class="input-group ">
              <input type="text" class="form-control  border-0" placeholder="পণ্য খুঁজুন (যেমন: পেঁয়াজ, চাল, আলু)" >
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
            <div class="col-lg-4 col-md-4 text-center">
              <div class="product">
                <div class="product-name">
                ধান
                  <i class=" product-icon fas fa-apple-alt"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 text-center">
              <div class="product ">
                <div class="product-name text-center">
                চাল
                  <i class=" product-icon fas fa-fish"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 text-center">
              <div class="product">
                <div class="product-name">
                ডাল
                  <i class=" product-icon fas fa-wine-glass-alt"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 text-center">
              <div class="product">
                <div class="product-name">
                  সবজি
                  <i class=" product-icon fas fa-apple-alt"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 text-center">
              <div class="product ">
                <div class="product-name text-center">
                  শাক
                  <i class=" product-icon fas fa-fish"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 text-center">
              <div class="product">
                <div class="product-name">
                  মশলা
                  <i class=" product-icon fas fa-wine-glass-alt"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 text-center">
              <div class="product">
                <div class="product-name">
                  ফল
                  <i class=" product-icon fas fa-apple-alt"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 text-center">
              <div class="product ">
                <div class="product-name text-center">
                  অন্যান্য
                  <i class=" product-icon fas fa-fish"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>  
    </div>
  </div>
</div>
@endsection