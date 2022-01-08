@extends('master')
@section('main-content')
<div class="main-content">
  <h5 class="p-4 text-center">Verify Document</h5>
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <div class="row  justify-content-center">
    <div class="col-md-6">
      <form autocomplete="off" method="POST" action="{{ route('document.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="NationalID">National ID Number</label>
          <input type="number" name="nid_number" value="{{ old('nid_number') }}" required class="form-control" id="NationalID" aria-describedby="emailHelp" placeholder="Enter ID Number">
          {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
        </div>
        <div class="form-group">
          <label>Upload National ID Picture</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
            <div class="custom-file">
              <input type="file" required name="nid_img" class="custom-file-input" onchange="readURL(this);" id="inputGroupFile01">
            </div>
          </div>
        </div>
        <div class="form-group">
          <img id="blah" src="#" hidden alt="your image" />
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
      </form>
    </div>
  </div>
</div>
@endsection
