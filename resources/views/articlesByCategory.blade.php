@extends('layouts.app')
@section('content')
@include('include.header')
<div id="blog">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>{{$category->name}}</h2>
        <div class="blog-area" style="margin-top:175px">
          <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
              <div class="blog-left blog-archive">
                <!-- Start single blog post -->
                @foreach($articles as $article)
                <article class="single-from-blog">
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <figure>
                      <a href="{{url($category->permalink . '/' . $article->permalink)}}">
                        <img alt="img" class="list-images" src="{{ asset('img/articles/'. $article->img_name) }}">
                      </a>
                    </figure>
                  </div>
                  <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="blog-title">
                      <h2 style="font-style: normal!important;">
                        <a href="{{url($category->permalink . '/' . $article->permalink)}}">{{$article->title}}</a>
                      </h2>
                      <p style="font-style: normal!important; font-weight: 100!important;">
                        <b>
                          Publicado por
                          <a class="blog-admin" style="color: #337ab7 !important;">{{$article->user->name}}</a> on
                          <span class="blog-date">{{$article->created_at}}</span>
                        </b>
                      </p>
                    </div>
                    <div class="inner-styles">
                      {!! \Illuminate\Support\Str::words(strip_tags($article->body), 45)!!}
                    </div>
                    <div class="inner-styles">
                      <p>
                        <a style="color: #337ab7 !important" href="{{url($category->permalink . '/' . $article->permalink)}}">Leer más
                        </a>
                      </p>
                    </div>
                  </div>
                </article>
                @endforeach
                <!-- End single blog post -->
                <!--Start Blog pagination -->
                {{$articles->links()}}
                <!-- End blog pagination -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>
  <br>
  <br>
  <br>
</div>
@include('include.footer')
@endsection