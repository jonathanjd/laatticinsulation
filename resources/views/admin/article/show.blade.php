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
    <div class="col-md-12">
      <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Show</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <div class="col-md-12">
                @if ($article->img_name === null)
                  <img class="img-responsive center-block img-thumbnail" height="300" width="300" src="{{ asset('img/articles/default-image.png') }}" alt="default-image">
                @else
                  <img class="img-responsive center-block img-thumbnail" height="300" width="300" src="{{ asset('img/articles/' . $article->img_name) }}" alt="{{ $article->img_name }}">
                @endif

              <h3 class="text-center">{{ $article->title }}</h3>

              {!! $article->body !!}

              </div>

              <div class="col-md-6">
                <p><strong>Wrote by: </strong>{{ $article->user->name }}</p>
              </div>
              <div class="col-md-6">
                <p><strong>Created at: </strong>{{ date('d/m/Y', strtotime($article->created_at)) }}</p>
              </div>
              <div class="col-md-12">
                <p><strong>Category:</strong> {{ $article->categories[0]->name }}</p>
                <p><strong>Seo Title:</strong> {{ $article->seo_title }}</p>
                <p><strong>SEO Description:</strong> {{ $article->seo_description }}</p>
                <p><strong>Keywords:</strong> {{ $article->keywords }}</p>
                <p><strong>Permalink:</strong> {{ $article->permalink }}</p>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
        <a href="{{ route('article.index') }}" class="btn btn-primary btn-block">Back</a>
    </div>
  </div>
@endsection