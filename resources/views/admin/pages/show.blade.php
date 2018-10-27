@extends('admin.main')

@section('title', 'Halaman Webiste')

@section('content')

<!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Halaman Website</li>
  </ol>

  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-admin"></i>
      Halaman Website
    </div>
    <div class="card-body">
      <div class="text-right" style="margin-bottom: 10px;">
        <a href="{{route('pages.edit', $page->id)}}" class="btn btn-success"><span class="fa fa-pencil">Edit Halaman</span></a>
        <a href="{{route('pages.index')}}" class="btn btn-info"><span class="fa fa-close">Kembali</span></a>
      </div>
      <div class="table-responsive">
        <div class="text-center">
          <h3>{{$page->title}}</h3>
          <img src="{{ asset('admin/images/pages/' . $page->image) }}" class="img-responsive img-thumbnail">
          <p>{{$page->caption}}</p>
        </div>
        <p>{!! $page->body !!}</p>
      </div>
    </div>
  </div>




@endsection
