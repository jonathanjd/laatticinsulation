@extends('layouts.app')
@section('title', $article->seo_title)
@section('meta-description',$article->seo_description)
@section('og-title', $article->seo_title)
@section('og-type', 'article')
@section('og-url', 'https://cmsweb.testing.info.ve/' . $article->permalink)
@section('og-image', $article->img_url)
@section('article-published_time', $article->created_at)
@section('article-modified_time', $article->created_at)
@section('article-tag', $article->keywords)
@section('article-author', $article->name)
@section('keywords', $article->keywords)
@section('content')
@include('include.header')
<section id="blog">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="blog-area" style="margin-top: 175px">
          <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12">
              <div class="blog-left blog-details">
                <!-- Start single blog post -->
                <article class="single-from-blog">
                  <div class="blog-title">
                    <h1>{{$article->title}}</h1>
                    <p>Publicado por
                      <a class="blog-admin" style="color: #337ab7 !important">{{$article->user->name}}</a>
                      en
                      <span class="blog-date">{{ date('d/m/Y', strtotime($article->created_at)) }}</span>
                    </p>
                  </div>
                  <div class="col-md-offset-3 col-md-6">
                    <figure>
                      <a>
                      <img class="img-size" alt="{{$article->img_name}}" src="{{ asset('img/articles/' . $article->img_name) }}">
                      </a>
                    </figure>
                  </div>
                  <div class="col-md-12">
                    <div class="blog-details-content" style="margin-top:30px">
                      {!!$article->body!!}
                    </div>
                    </br>
                    <p>Categoría:
                      <a href="{{url('/'.$article->categories[0]->permalink)}}">{{$article->categories[0]->name}}</a>
                    </p>
                  </div>
                </article>

                <h2 style="margin-left: 25px">Artículos Relacionados:</h2>
                <br> @php $iteration = 1; @endphp @foreach($related_articles->articles as $related_article)

                <div class="col-md-4">
                  <article class="single-from-blog" style="margin-bottom: 20px">
                    <figure>
                      <a href="{{url($category . '/' . $related_article->permalink)}}">
                        <img src="{{ asset('img/articles/' . $related_article->img_name) }}" class="related-images" alt="{{$related_article->img_name}}">
                      </a>
                    </figure>
                    <div class="blog-title">
                      <h2>
                        <a href="{{url($category . '/' . $related_article->permalink)}}">{{$related_article->title}}</a>
                      </h2>
                    </div>
                    <div class="inner-styles">
                      {!! \Illuminate\Support\Str::words(strip_tags($related_article->body), 15)!!}
                    </div>

                  </article>
                  <div style="text-align: center!important;">
                    {{--
                    <a href="{{url('articles/' . $related_article->permalink)}}" --}} {{--class="button button-default read-more"
                      --}} {{--data-text="Leer más">
                      <span>Leer más</span>
                    </a>--}}
                  </div>
                </div>
                @php $iteration = $iteration+1; @endphp @endforeach
              </div>
            </div>
            <div class="col-md-3">
              {{--
              <a href="{{url('https://www.youtube.com/user/1984alrodri')}}" target="_blank">--}} {{--
                <img style="width: 100%" src="{{asset('images/bannerHorizontal.jpeg')}}" --}} {{--alt="banner">--}} {{--
              </a>--}}

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
</section>
<!-- End blog section -->
@include('include.footer')
@endsection