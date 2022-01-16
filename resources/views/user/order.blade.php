@extends('master')
@section('main-content')
<div class="main-content">
  <h3 class="text-center py-3">User Product Order</h3>
  <div class=" mx-5">
    @if ($orders->count() == 0)
    <div class="card mb-4 ">
      <div class="card-body order-item text-center">
        <div class="order-heading">
          <span class="pl-5 font-weight-bold">No Order</span>
        </div>
      </div>
    </div>
    @else
      @foreach ($orders as $order )
      <a href="{{ route('user.single.order', ['id'=> $order->order_no]) }}">
      <div class="card mb-4 ">
        <div class="card-body order-item">
          <div class="order-heading">
            <span class="pl-5 font-weight-bold">#{{$order->order_no}}</span>
            <span class="mx-5 px-5" style="width: 10%">Qunatity: {{$order->quantity.$order->product_type}}</span>
            <span class="mx-5 ">Issue Date: {{$order->created_at->format('d-M-Y')}}</span>
            <span class="mx-5 float-right">Total: {{$order->amount}} tk</span>
          </div>
        </div>
      </div>
      </a>
      @endforeach
    @endif
  </div>
</div>
@endsection