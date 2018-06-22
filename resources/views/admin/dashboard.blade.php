@extends('layouts.appAdmin')
@section('content-header')
<h1>Dashboard</h1>
@endsection

@section('content')

  <div class="row">
    <div class="col-md-4">
      <a href="{{ route('category.index') }}">
        <div class="info-box">

          <span class="info-box-icon bg-aqua">
            <i class="fa fa-bookmark"></i>
          </span>

          <div class="info-box-content">
            <span class="info-box-text">Category</span>
          </div>
          <!-- /.info-box-content -->
        </div>
      </a>
    </div>
    <div class="col-md-4">
      <a href="{{ route('article.index') }}">
        <div class="info-box">
          <span class="info-box-icon bg-navy">
            <i class="fa fa-pencil"></i>
          </span>

          <div class="info-box-content">
            <span class="info-box-text">Article</span>

          </div>
          <!-- /.info-box-content -->
        </div>
      </a>
    </div>
    <div class="col-md-4">
      <a href="#">
        <div class="info-box">
          <span class="info-box-icon bg-purple">
            <i class="fa fa-user"></i>
          </span>

          <div class="info-box-content">
            <span class="info-box-text">User</span>
          </div>
          <!-- /.info-box-content -->
        </div>
      </a>
    </div>

  </div>
@endsection