@extends('admin.layout')

@section('main-content')
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4 mt-3">
      <div class="card shadow mb-4">
        <div class="row px-3">
          <div class="col-md-6">
            <h1 class="mt-4">Demand Details</h1>
          </div>
          <div class=" mt-4 col-md-6 text-right" style="text-align: right;">
              <a href="{{ route('admin.demand') }}" class="btn btn-info"><i class="fas fa-arrow-left"></i>Back</a>
          </div>
        </div>
        <div class="card-body ">
          <div class="row justify-content-md-center">
            <div class="col-md-10">
              <table id="datatablesSimple">
                <tr>
                    <th class="text-right">Offer No:</th>
                    <td>#{{ $offer->offer_no }}</td>
                </tr>
                <tr>
                    <th class="text-right">Product Name:</th>
                    <td>{{ $offer->product->title }}</td>
                </tr>
                <tr>
                    <th class="text-right">User Name:</th>
                    <td>{{ $offer->user->name }}</td>
                </tr>
                <tr>
                    <th class="text-right">Quantity:</th>
                    <td>{{ $offer->quantity.$offer->product_type }}</td>
                </tr>
                <tr>
                    <th class="text-right">Delivery Charge:</th>
                    <td>{{ $offer->delivery_charge }}</td>
                </tr>
                {{-- <tr>
                    <th class="text-right">Payment Type:</th>
                    <td>{{ $offer->payment_type }}</td>
                </tr> --}}
                <tr>
                    <th class="text-right">Offer Status:</th>
                    <td>{{ $offer->status }}</td>
                </tr>
                <tr>
                  <td colspan="2">
                    <div class=" text-center" style="text-align: center;">
                      @if ( $offer->admin_approve == 1)
                        <a href="#" class="btn btn-info disabled">Approved</a>
                      @else
                        <a href="{{ route('demand.approve',['id'=>$offer->id]) }}" class="btn btn-info">Approve</a>
                      @endif
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>
@endsection