@extends('admin.layout')

@section('main-content')
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <div class="row">
        <div class="col-md-6">
          <h1 class="mt-4">Categories</h1>
        </div>
        <div class=" mt-4 col-md-6 text-right" style="text-align: right;">
            <a href="{{ route('categories.create')}}" class="btn btn-info"><i class="fa fa-plus"></i> New Category</a>
        </div>
      </div>
      <div class="card mb-4">
        <div class="card-body">
          <table id="datatablesSimple">
            <thead>
              <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Icon</th>
                <th class="text-right">Action</th>
            </tr>
            </thead>
            <tbody>
              @php($id = 1)
              @foreach($categories as $category)
              <tr>
                <td>{{ $id++ }}</td>
                <td>{{ $category->title }}</td>
                <td><i class="fa {{ $category->category_icon }}"></i></td>
                <td class="text-right">
                  <form method="POST" action="{{ route('categories.destroy', ['category' =>$category->id]) }}">
                      @csrf
                      @method('DELETE')
                      <a class="btn btn-primary btn-sm" href="{{ route('categories.edit',['category' => $category->id]) }}"><i class="fa fa-edit"></i></a>
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