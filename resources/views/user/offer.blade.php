@extends('master')
@section('main-content')
<div class="main-content">
  <h3 class="text-center py-3">User Product Offer</h3>
  <div class=" mx-5">
    @foreach ($offers as $offer )
    <a href="{{ route('user.single.offer', ['id'=> $offer->offer_no]) }}">
    <div class="card mb-4 ">
      <div class="card-body order-item">
        <div class="order-heading">
          <span class="pl-5 font-weight-bold">#{{$offer->offer_no}}</span>
          <span class="mx-5 px-5" style="width: 10%">Qunatity: {{$offer->quantity.$offer->product_type}}</span>
          <span class="mx-5 ">Issue Date: {{$offer->created_at->format('d-M-Y')}}</span>
          <span class="mx-5 float-right">Total: {{$offer->amount}} tk</span>
        </div>
      </div>
    </div>
    </a>
    @endforeach
  </div>
</div>
@endsection