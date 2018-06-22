@extends('layouts.appAdmin')
@section('content-header')
@if (Session::has('flash'))
  @include('admin.include.alert', ['type' => 'alert-success', 'message' => Session::get('flash')])
@endif
<h1>Category</h1>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      <a href="{{ route('category.create') }}" class="btn btn-success pull-right">Create Category</a>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody>
                  <tr>
                  <th class="text-center">ID</th>
                  <th class="text-center">Category</th>
                  <th class="text-center">Date</th>
                  <th></th>
                </tr>
                @foreach ($categories as $category)
                  <tr>
                    <td class="text-center">{{ $category->id }}</td>
                    <td class="text-center">{{ $category->name }}</td>
                    <td class="text-center">{{ date('d/m/Y', strtotime($category->created_at)) }}</td>
                    <td class="text-center"><a href="{{ route('category.edit', $category) }}" class="btn btn-warning">Edit</a></td>
                  </tr>
                @endforeach
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <div>
            {{ $categories->links() }}
          </div>
    </div>
  </div>
@endsection