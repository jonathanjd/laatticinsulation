@extends('layouts.appAdmin')
@section('content-header')
@if (Session::has('flash'))
  @include('admin.include.alert', ['type' => 'alert-success', 'message' => Session::get('flash')])
@endif
<h1>Article</h1>
@endsection

@section('content')
  <div class="row">

  </div>
  <br>
  <div class="row">
    <div class="col-md-6">
      <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Delete</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <div class="col-md-12">
                @if ($article->img_name === null)
                  <img class="img-responsive center-block img-thumbnail" height="300" width="300" src="{{ asset('img/articles/default-image.png') }}" alt="default-image">
                @else
                  <img class="img-responsive center-block img-thumbnail" height="300" width="300" src="{{ asset('img/articles/' . $article->img_name) }}" alt="{{ $article->img_name }}">
                @endif

              <h3 class="text-center">Article: {{ $article->title }}</h3>

              <form action="{{ route('article.destroy', $article) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <div class="form-group">
                  <p class="text-center text-uppercase"><strong>Do you want delete this article?</strong></p>
                  <button type="submit" class="btn btn-danger btn-block">Delete</button>
                </div>
              </form>

              </div>

            </div>
            <!-- /.box-body -->
          </div>
        <a href="{{ route('article.index') }}" class="btn btn-primary btn-block">Back</a>
    </div>
  </div>
@endsection