@extends('master')
@section('main-content')
  <div class="main-content">
    <h3 class="text-center py-3">Product Offer</h3>
    <form action="{{ route('product.offer.create') }}" method="POST">
    @csrf
    <div class="product-item mx-5">
      <div class="card">
        <div class="card-body">
          <img class="float-left" src="{{ asset('Product_image').'/'.$product->picture }}" >
          <h4 class="float-left pl-4 mb-0">{{$product->title}}</h4>
          <div class="quantity_type float-left">
            <input type="number" value="1" name="quantity" min="1" class="form-control order_quatity" id="quantity" placeholder="Product Quantity">
            <select name="product_type" id="inputState" class="form-control oreder_type">
              <option value="kg" selected>Product Unit</option>
              <option value="kg" >kg</option>
              <option value="mon">mon</option>
              <option value="bag" >bag</option>
            </select>
          </div>
          <div class="price-section ">
            <span class="float-left">Price </span>
            <span class="float-right">tk.<span id="cost-price">{{ $product->cost_price }}</span>/-</span>
          </div>
        </div>
      </div>
    </div>
    <div class="row m-0 p-0">
      <div class="payment-review py-5 float-left">
        <div class="row mx-5">
          <span><strong class="text-danger">*</strong> If you have this product than give a offer.</span>
        </div>
      </div>
      <div class="payment-review py-5 mx-5 float-right">
        <div class="row mx-5">
          <table style="width: 100%">
            <tr>
              <th>Product Total</th>
              <th  class="float-right">tk.<span id="product_total">{{ $product->cost_price }}</span>/-</th>
              <input type="hidden" name="sub_total" id="product_total_cost">
            </tr>
            <tr>
              <th>Delivery Charge</th>
              <th  class="float-right">tk.<span id="delivery_charge">150</span>/-</th>
              <input type="hidden" name="delivery_charge" id="delivery_cost">
            </tr>
            <tr>
              <th>Total </th>
              <th class="float-right">tk.<span id="total_charge">{{ $product->cost_price }}</span>/-</th>
              <input type="hidden" name="amount" id="total_order_cost">
              <input type="hidden" name="product_id" value="{{ $product->id }}">
              <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div class="payment-button text-center py-5">
      <button type="submit" class="btn btn-lg px-5 btn-success">Place Offer</button>
    </div>
  </form>
  </div>
@endsection