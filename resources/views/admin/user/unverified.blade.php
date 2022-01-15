@extends('admin.layout')

@section('main-content')
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <div class="row">
        <div class="col-md-6">
          <h1 class="mt-4">Unverified Users</h1>
        </div>
        {{-- <div class=" mt-4 col-md-6 text-right" style="text-align: right;">
            <a href="{{ route('products.create')}}" class="btn btn-info"><i class="fa fa-plus"></i> New Product</a>
        </div> --}}
      </div>
      <div class="card mb-4">
        <div class="card-body">
          <table id="datatablesSimple">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Type</th>
                <th class="text-right">Action</th>
            </tr>
            </thead>
            <tbody>
              @php($id = 1)
              @foreach($users as $user)
                <tr>
                  <td>{{ $id++ }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->phone }}</td>
                  <td>{{ $user->user_type }}</td>
                  <td class="text-right">
                    <a class="btn btn-primary btn-sm" href="{{ route('show.unverified',['id' => $user->id]) }}"><i class="fa fa-eye"></i></a>
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