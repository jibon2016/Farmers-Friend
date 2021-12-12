@extends('admin.layout')

@section('main-content')
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4 mt-3">
      <div class="card shadow mb-4">
          <div class="card-header py-3">
            <div class="row px-3">
              <div class="col-md-6">
                <h3 class="mt-4">{{ $headline }}</h3>
              </div>
              <div class=" mt-4 col-md-6 text-right" style="text-align: right;">
                  <a href="{{ route('categories.index') }}" class="btn btn-info"><i class="fas fa-arrow-left"></i>Back</a>
              </div>
            </div>
          </div>
          <div class="card-body ">
              <div class="row justify-content-md-center">
                  <div class="col-md-10">
                    @if ($mode == 'edit')
                      <form method="POST" action="{{ route('categories.update', $category->id ) }}" enctype="multipart/form-data">
                      @method('PUT')
                    @else 
                      <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                    @endif 
                      @csrf
                      <div class="form-group row">
                          <label for="title" class="col-sm-3 text-right col-form-label">Title <span class="text-danger">*</span></label>
                          <div class="col-sm-8">
                            @if ($mode == 'edit')
                              <input type="text" name="title" value="{{$category->title}}" class="form-control" placeholder="Category Title">
                            @else
                              <input type="text" name="title" value="" class="form-control" placeholder="Category Title">
                            @endif
                          </div>
                      </div>
                      <div class="form-group row py-4">
                        <label for="category_icon" class="col-sm-3 text-right col-form-label">Category Icon <span class="text-danger">*</span></label>
                        <div class="col-sm-5">
                          @if ($mode == 'edit')
                            <input type="text"  id="icon" onchange="readIcon()" name="category_icon" value="{{$category->category_icon}}" class="form-control" placeholder="Category Title">
                          @else
                            <input type="text" id="icon" onchange="readIcon()" name="category_icon" value="" class="form-control" placeholder="Category Icon">
                          @endif
                        </div>
                        <div class="col-sm-3 text-center">
                          <i id="showIcon" class="fa"></i>
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
@section('js')
<script type="text/javascript">
  function readIcon() {
    var iconValue = document.getElementById("icon").value;
    var element = document.getElementById("icon");

    const myArray = iconValue.split(" ")
  
    document.getElementById("showIcon").classList.add(...myArray);
  
    // var arrowIcon = document.createElement("i");
    // arrowIcon.classList.add(iconValue);
    // document.getElementById("showIcon").appendChild(arrowIcon);
  
    console.log(myArray);
  }
  </script>
@endsection
@endsection