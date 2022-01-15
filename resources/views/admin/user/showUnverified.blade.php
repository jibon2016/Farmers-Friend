@extends('admin.layout')

@section('main-content')
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4 mt-3">
      <div class="card shadow mb-4">
        <div class="row px-3">
          <div class="col-md-6">
            <h1 class="mt-4">{{ $user->name }}</h1>
          </div>
          <div class=" mt-4 col-md-6 text-right" style="text-align: right;">
              <a href="{{ route('unverified') }}" class="btn btn-info"><i class="fas fa-arrow-left"></i>Back</a>
          </div>
        </div>
        <div class="card-body ">
          <div class="row justify-content-md-center">
            <div class="col-md-10">
              <table class="table-responsive">
                <tr>
                    <th class="text-right">Name :</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th class="text-right">Phone :</th>
                    <td>{{ $user->phone }}</td>
                </tr>
                <tr>
                    <th class="text-right">District :</th>
                    <td>{{ $user->district }}</td>
                </tr>
                <tr>
                    <th class="text-right">Type:</th>
                    <td>{{ $user->user_type }}</td>
                </tr>
                <tr>
                    <th class="text-right">NID :</th>
                    <td><img src="{{ asset('Documents')."/".$document->nid_img }}" alt=""></td>
              </table>  
              <div class=" mt-4 col-md-6 text-center" style="text-align: center;">
                <a href="{{ route('nid.approve',['id'=>$user->id]) }}" class="btn btn-info">Approve</a>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>
@endsection