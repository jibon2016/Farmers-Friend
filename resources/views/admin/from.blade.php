@extends('admin.layout')

@section('main-content')
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4 mt-3">
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Create Product</h6>
          </div>
          <div class="card-body ">
              <div class="row justify-content-md-center">
                  <div class="col-md-10">
                    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group row">
                          <label for="title" class="col-sm-3 text-right col-form-label">Title <span class="text-danger">*</span></label>
                          <div class="col-sm-8">
                              <input type="text" name="title" class="form-control" placeholder="Product Title">
                          </div>
                      </div>

                      <div class="form-group row py-3">
                          <label for="description" class="col-sm-3 text-right col-form-label">Description</label>
                          <div class="col-sm-8">
                            <textarea name="description" class="form-control" id="" cols="30" rows="5"></textarea>
                              
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="category" class="col-sm-3 text-right col-form-label">Categories<span class="text-danger">*</span></label>
                          <div class="col-sm-8">
                            <select name="category_id" class="custom-select form-control" id="inputGroupSelect01">
                              <option selected>Choose...</option>
                              <option value="1">One</option>
                              <option value="2">Two</option>
                              <option value="3">Three</option>
                            </select>
                          </div>
                      </div>

                      <div class="form-group row py-3">
                          <label for="cost_price" class="col-sm-3 text-right col-form-label">Cost Price <span class="text-danger">*</span></label>
                          <div class="col-sm-8">
                            <input type="number" name="cost_price" class="form-control" placeholder="Product Price">
                          </div>
                      </div>

                      

                      <div class="form-group row">
                          <label for="category" class="col-sm-3 text-right col-form-label">Picture<span class="text-danger">*</span></label>
                          <div class="col-sm-8">
                            <div class="custom-file">
                              <input type="file" name="picture" class="custom-file-input form-control" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            </div>
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="" class="col-sm-1 text-right col-form-label"></label>
                          <div class="col-sm-5 mt-3" >
                              <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Submit</button>
                          </div>
                      </div>

                      <div class="text-right">
                      </div>
                    </form>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </main>
</div>
@endsection