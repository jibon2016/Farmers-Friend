@extends('admin.layout')

@section('main-content')
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4 mt-3">
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">{{ $headline }}</h6>
          </div>
          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
          <div class="card-body ">
              <div class="row justify-content-md-center">
                  <div class="col-md-10">
                    @if ($mode == 'edit')
                      <form method="POST" action="{{ route('products.update', $product->id ) }}" enctype="multipart/form-data">
                      @method('PUT')
                    @else 
                      <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                    @endif 
                      @csrf
                      <div class="form-group row">
                          <label for="title" class="col-sm-3 text-right col-form-label">Title <span class="text-danger">*</span></label>
                          <div class="col-sm-8">
                            @if ($mode == 'edit')
                              <input type="text" name="title" value="{{$product->title}}" class="form-control" placeholder="Product Title">
                            @else
                              <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Product Title">
                            @endif
                          </div>
                      </div>

                      <div class="form-group row py-3">
                          <label for="description" class="col-sm-3 text-right col-form-label">Description</label>
                          <div class="col-sm-8">
                            @if ($mode == 'edit')
                             <textarea name="description" class="form-control" id="" cols="30" rows="5">{{ $product->description }}</textarea>
                            @else
                              <textarea name="description" class="form-control" id="" cols="30" rows="5">{{ old('description') }}</textarea>
                            @endif
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="category" class="col-sm-3 text-right col-form-label">Categories<span class="text-danger">*</span></label>
                          <div class="col-sm-8">
                            <select name="category_id" class="custom-select form-control" id="inputGroupSelect01">
                              <option selected>Choose...</option>
                              @foreach($category as $item)
                                @if ($mode == 'edit')
                                  <option  value="{{ $item->id }}" {{ $item->id == $product->category->id ? "Selected": "" }}>{{ $item->title }}</option>
                                @else
                                <option  value="{{ $item->id }}" >{{ $item->title }}</option>
                                @endif
                              @endforeach
                            </select>
                          </div>
                      </div>
                      <div class="form-group row py-3">
                          <label for="cost_price" class="col-sm-3 text-right col-form-label">Cost Price <span class="text-danger">*</span></label>
                          <div class="col-sm-8">
                            @if ($mode == 'edit')
                              <input type="number" name="cost_price" value="{{ $product->cost_price}}" class="form-control" placeholder="Product Price">
                            @else
                              <input type="number" name="cost_price" value="{{ old("cost_price")}}" class="form-control" placeholder="Product Price">
                            @endif
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
                    </form>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </main>
</div>
@endsection