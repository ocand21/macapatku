@extends('admin.main')

@section('title', 'Berita Website')

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
        <a href="{{route('news.create')}}" class="btn btn-info btn-sm"><span class="fa fa-plus">Tambah Berita</span></a>
      </div>
      <div class="table-responsive">
        <table width="100%" class="table table-striped table-bordered" >
          <thead>
            <tr>
              <th>#</th>
              <th>Gambar</th>
              <th>Judul</th>
              <th>Isi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>

          @foreach($news as $news)
          <tr class="odd gradeX">
              <td>{{ $news->id}}</td>

              <td>
                <img src="{{ asset('admin/images/news/' . $news->image) }}" style="height: 70px; width: 70px">
              </td>
              <td>{{ substr($news->title, 0, 30) }}{{ strlen($news->title) > 30 ? "..." : "" }}</td>
              <td>{!! substr($news->body, 0, 300) !!}{!! strlen($news->body) > 300 ? "..." : "" !!}</td>
              <td width="13%" class="text-center">
                <a href="{{route('news.show', $news->id)}}" class="btn btn-info btn-sm" title="Detail"><i class="fa fa-search"></i></a>
                <a href="{{route('news.edit', $news->id)}}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
              </td>
          </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>




@endsection
