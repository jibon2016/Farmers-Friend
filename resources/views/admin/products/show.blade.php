@extends('admin.layout')

@section('main-content')
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4 mt-3">
      <div class="card shadow mb-4">
        <div class="row px-3">
          <div class="col-md-6">
            <h1 class="mt-4">{{ $product->title }}</h1>
          </div>
          <div class=" mt-4 col-md-6 text-right" style="text-align: right;">
              <a href="{{ route('products.index') }}" class="btn btn-info"><i class="fas fa-arrow-left"></i>Back</a>
          </div>
        </div>
        <div class="card-body ">
          <div class="row justify-content-md-center">
            <div class="col-md-10">
              <table id="datatablesSimple">
                <tr>
                    <th class="text-right">Title :</th>
                    <td>{{ $product->title }}</td>
                </tr>
                <tr>
                    <th class="text-right">Description </th>
                    <td>{{ $product->description }}</td>
                </tr>
                <tr>
                    <th class="text-right">Category :</th>
                    <td>{{ $product->category->title }}</td>
                </tr>
                <tr>
                    <th class="text-right">Cost Price :</th>
                    <td>{{ $product->cost_price }}</td>
                </tr>
                <tr>
                    <th class="text-right">Picture:</th>
                    <td><img src="{{ asset('Product_image')."/".$product->picture }}" alt=""></td>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>
@endsection