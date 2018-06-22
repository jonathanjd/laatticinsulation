@extends('layouts.appAdmin')
@section('content-header')
@if (Session::has('flash'))
  @include('admin.include.alert', ['type' => 'alert-success', 'message' => Session::get('flash')])
@endif
<h1>Article</h1>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      <a href="{{ route('article.create') }}" class="btn btn-success pull-right">Create Article</a>
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
                  <th class="text-center">Title</th>
                  <th class="text-center">Author</th>
                  <th class="text-center">Category</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Date</th>
                  <th></th>
                </tr>

                @foreach ($articles as $article)
                  <tr>
                    <td class="text-center">{{ $article->id }}</td>
                    <td class="text-center">{{ $article->title }}</td>
                    <td class="text-center">{{ $article->user->name }}</td>
                    <td class="text-center">{{ $article->categories[0]->name }}</td>
                    <td class="text-center text-uppercase">{{ $article->status }}</td>
                    <td class="text-center">{{ date('d/m/Y', strtotime($article->created_at)) }}</td>
                    <td class="text-center"><a href="{{ route('article.show', $article) }}" class="btn btn-info">Show</a></td>
                    <td class="text-center"><a href="{{ route('article.edit', $article) }}" class="btn btn-warning">Edit</a></td>
                    <td class="text-center"><a href="{{ route('article.delete', $article) }}" class="btn btn-danger">Delete</a></td>
                  </tr>
                @endforeach
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <div>
            {{ $articles->links() }}
          </div>
    </div>
  </div>
@endsection