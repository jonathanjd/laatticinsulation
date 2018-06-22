@extends('layouts.appAdmin')
@section('content-header')
<h1>Category</h1>
@endsection
@section('content')
<div class="row">
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Edit</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form action="{{ route('category.update', $category) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="box-body">
          <div class="form-group {{ $errors->has('name') ? 'has-error': '' }}">
            <label for="exampleInputEmail1">Name</label>
            <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" value="{{ $category->name }}">
            @if ($errors->first('name'))
            <span class="help-block">{{ $errors->first('name') }}</span>
            @endif
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
    <a href="{{ route('category.index') }}" class="btn btn-primary btn-block">Back</a>
  </div>
</div>
@endsection


