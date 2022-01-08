@extends('admin.layout')

@section('main-content')
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <div class="row">
        <div class="col-md-6">
        <h1 class="mt-4">Orders</h1>
        </div>
        <div class=" mt-4 col-md-6 text-right" style="text-align: right;">
            <a href="{{ route('products.create')}}" class="btn btn-info"><i class="fa fa-plus"></i> New Product</a>
        </div>
      </div>
      <div class="card mb-4">
        <div class="card-body">
          <table id="datatablesSimple">
            <thead>
              <tr>
                <th>ID</th>
                <th>Order No.</th>
                <th>User Name</th>
                <th>Order Price</th>
                <th>Quantity</th>
                <th>Status</th>
                <th class="text-right">Action</th>
            </tr>
            </thead>
            <tbody>
              @php($id = 1)
              @foreach($orders as $order)
                  <tr>
                      <td>{{ $id++ }}</td>
                      <td>{{ $order->order_no }}</td>
                      <td>{{ optional($order->user)->name }}</td>
                      <td>{{ $order->amount }}</td>
                      <td>{{ $order->quantity}}</td>
                      <td>{{ $order->status}}</td>
                      <td class="text-right">
                        <form method="POST" action="{{ route('orders.destroy', ['id'=> $order->id]) }}">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-primary btn-sm" href="{{ route('orders.show', ['id' => $order->id]) }}"><i class="fa fa-eye"></i></a>
                            <button onclick="return confirm('Are you Sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                  </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
</div>
@endsection