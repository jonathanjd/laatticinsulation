@extends('layouts.appAdmin')
@section('content-header')
<h1>Article</h1>
@endsection

@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Create</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form action="{{ route('article.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="box-body">
          <div class="form-group {{ $errors->has('title') ? 'has-error': '' }}">
            <label for="title">Title</label>
            <input name="title" type="text" class="form-control" placeholder="Title 6-10 Words" value="{{ old('title') }}">
            @if ($errors->first('title'))
              <span class="help-block">{{ $errors->first('title') }}</>
            @endif
          </div>

          <div class="form-group {{ $errors->has('permalink') ? 'has-error': '' }}">
            <label for="permalink">Permalink</label>
            <input name="permalink" type="text" class="form-control" placeholder="Title 6-10 Words" value="{{ old('permalink') }}">
            @if ($errors->first('permalink'))
            <span class="help-block">{{ $errors->first('permalink') }}</span>
            @endif
          </div>

          <div class="form-group {{ $errors->has('body') ? 'has-error': '' }}">
            <label for="">Body</label>
            <textarea id="body" name="body" rows="10" cols="80">
              {{ Request::old('body') }}
            </textarea>
            @if ($errors->first('permalink'))
            <span class="help-block">{{ $errors->first('body') }}</span>
            @endif
          </div>

          <div class="form-group">
              <label for="file">Select a File</label>
              <input type="file" name="file">
          </div>

          <div class="form-group">
            <label>Select</label>
            <select class="form-control" name="category">
              @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group {{ $errors->has('seo_title') ? 'has-error': '' }}">
            <label for="seo_title">Seo Title</label>
            <input name="seo_title" type="text" class="form-control" placeholder="Seo Title 8-12 Words(Palabras Claves)" value="{{ old('seo_title') }}">
            @if ($errors->first('seo_title'))
            <span class="help-block">{{ $errors->first('seo_title') }}</span>
            @endif
          </div>

          <div class="form-group {{ $errors->has('seo_description') ? 'has-error': '' }}">
            <label for="seo_description">Seo Description</label>
            <textarea name="seo_description" class="form-control" placeholder="Seo Description Hasta 30 Words(1 o 2 Frases)(Palabras Claves)">{{ Request::old('seo_description') }}</textarea>
            @if ($errors->first('seo_description'))
            <span class="help-block">{{ $errors->first('seo_description') }}</span>
            @endif
          </div>

          <div class="form-group {{ $errors->has('keywords') ? 'has-error': '' }}">
            <label for="keywords">Seo Keywords</label>
            <input name="keywords" type="text" class="form-control" placeholder="Seo Keywords(3-4 Words)" value="{{ old('keywords') }}">
            @if ($errors->first('keywords'))
            <span class="help-block">{{ $errors->first('keywords') }}</span>
            @endif
          </div>


        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-success btn-block">Save</button>
        </div>
      </form>
    </div>
    <a href="{{ route('article.index') }}" class="btn btn-primary btn-block">Back</a>
  </div>
</div>
@endsection

@section('script')
<script src="{{ asset('adminLTE/js/ckeditor/ckeditor.js') }}"></script>
  <script>
    $(function () {
      CKEDITOR.replace('body')
    })
  </script>
@endsection




