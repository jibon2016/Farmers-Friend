@extends('master')
@section('main-content')
  <div class="main-content">
    <h3 class="text-center py-3">Product Order</h3>
    <form action="{{ url('/checkout') }}" method="POST">
      @csrf
    <div class="product-item mx-5">
      <div class="card">
        <div class="card-body">
          <img class="float-left" src="{{ asset('Product_image').'/'.$product->picture }}" >
          <h4 class="float-left pl-4 mb-0">{{$product->title}}</h4>
          <div class="quantity_type float-left">
            <input type="number" value="1" name="product_quantity" min="1" class="form-control order_quatity" id="inputZip" placeholder="Product Quantity">
            <select name="product_unit" id="inputState" class="form-control oreder_type">
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
          <span><strong class="text-danger">*</strong> For confirm the order, payment minimum 30% of order Price</span>
        </div>
      </div>
      <div class="payment-review py-5 mx-5 float-right">
        <div class="row mx-5">
          <table style="width: 100%">
            <tr>
              <th>Product Total</th>
              <th  class="float-right">tk.<span id="product_total">{{ $product->cost_price }}</span>/-</th>
              <input type="hidden" name="product_total" id="product_total_cost">
            </tr>
            <tr>
              <th>Delivery Charge</th>
              <th  class="float-right">tk.<span id="delivery_charge">150</span>/-</th>
              <input type="hidden" name="delivery_charge" id="delivery_cost">
            </tr>
            <tr>
              <th>Total </th>
              <th class="float-right">tk.<span id="total_charge"></span>/-</th>
              <input type="hidden" name="order_total" id="total_order_cost">
              <input type="hidden" name="product_id" value="{{ $product->id }}">
              <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div class="payment-button text-center py-5">
      <button type="submit" class="btn btn-lg px-5 btn-success">Paytment</button>
    </div>
  </form>
  </div>
@endsection