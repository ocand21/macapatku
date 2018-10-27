@extends('admin.main')

@section('title', 'Berita Webiste')

@section('content')

<!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Berita Website</li>
  </ol>

  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-admin"></i>
      Berita Website
    </div>
    <div class="card-body">
      <div class="text-right" style="margin-bottom: 10px;">
        <a href="{{route('news.edit', $news->id)}}" class="btn btn-success"><span class="fa fa-pencil">Edit Berita</span></a>
        <a href="{{route('news.index')}}" class="btn btn-info"><span class="fa fa-close">Kembali</span></a>
      </div>
      <div class="table-responsive">
        <div class="text-center">
          <h3>{{$news->title}}</h3>
          <img src="{{ asset('admin/images/news/' . $news->image) }}" class="img-responsive img-thumbnail">
          <p>{{$news->caption}}</p>
        </div>
        <p>{!! $news->body !!}</p>
      </div>
    </div>
  </div>




@endsection
