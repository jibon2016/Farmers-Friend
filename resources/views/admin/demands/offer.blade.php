@extends('admin.layout')

@section('main-content')
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <div class="row">
        <div class="col-md-6">
        <h1 class="mt-4">Demands</h1>
        </div>
        <div class=" mt-4 col-md-6 text-right" style="text-align: right;">
        </div>
      </div>
      <div class="card mb-4">
        <div class="card-body">
          <table id="datatablesSimple">
            <thead>
              <tr>
                <th>ID</th>
                <th>Offer No.</th>
                <th>User Name</th>
                <th>Demand Price</th>
                <th>Is Approve</th>
                <th>Status</th>
                <th class="text-right">Action</th>
            </tr>
            </thead>
            <tbody>
              @php($id = 1)
              @foreach($demands as $demand)
                  <tr>
                      <td>{{ $id++ }}</td>
                      <td>{{ $demand->offer_no }}</td>
                      <td>{{ optional($demand->user)->name }}</td>
                      <td>{{ $demand->amount }}</td>
                      <td class="text-bold {{ ($demand->admin_approve == 1) ? 'text-success' : 'text-danger' }}">{{ ($demand->admin_approve == 1) ? 'Approved' : 'Not Approved' }}</td>
                      <td>{{ $demand->status}}</td>
                      <td class="text-right">
                        <form method="POST" action="{{ route('demand.destroy', ['id'=> $demand->id]) }}">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-primary btn-sm" href="{{ route('demand.show', ['id' => $demand->id]) }}"><i class="fa fa-eye"></i></a>
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