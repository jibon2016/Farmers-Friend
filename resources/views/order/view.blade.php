@extends('master')
@section('main-content')
  <div class="main-content">
    <h3 class="text-center py-3">Product Order</h3>
    <div class="product-item mx-5">
      <div class="card">
        <div class="card-body">
          <img class="float-left" src="{{ asset('Product_image/20211119150232.jpg') }}" >
          <h4 class="float-left pl-4 mb-0">Product Title</h4>
          <div class="quantity_type float-left">
            <input type="number" class="form-control order_quatity" id="inputZip" placeholder="Product Quantity">
            <select id="inputState" class="form-control oreder_type">
              <option selected>Product Unit</option>
              <option>kg</option>
              <option>mon</option>
            </select>
          </div>
          <div class="price-section ">
            <span class="float-left">Per Unit price (tk.)</span>
            <span class="float-right">2000/-</span>
          </div>
        </div>
      </div>
    </div>
    <div class="payment-review py-5 float-right">
      <div class="row mx-5">
        <h3>Payment</h3>
      </div>
    </div>

  </div>
@endsection