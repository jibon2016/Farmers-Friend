@extends('admin.layout')


@section('main-content')
<div id="layoutSidenav_content">
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Total Orders:</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class=" text-white" href="#">#{{$orders->count()}}</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Total Demands:</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class=" text-white stretched-link" href="#">#{{$demands->count()}}</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Total Payment:</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">tk {{$orders->sum('amount')}}</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Unverified Users:</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">{{$users->count()}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</div>
@endsection