@extends('admin.main')

@section('title', 'Halaman Website')

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
        <a href="{{route('pages.create')}}" class="btn btn-info btn-sm"><span class="fa fa-plus">Tambah Halaman</span></a>
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

          @foreach($pages as $page)
          <tr class="odd gradeX">
              <td>{{ $page->id}}</td>

              <td>
                <img src="{{ asset('admin/images/pages/' . $page->image) }}" style="height: 70px; width: 70px">
              </td>
              <td>{{ substr($page->title, 0, 30) }}{{ strlen($page->title) > 30 ? "..." : "" }}</td>
              <td>{!! substr($page->body, 0, 300) !!}{!! strlen($page->body) > 300 ? "..." : "" !!}</td>
              <td width="13%" class="text-center">
                <a href="{{route('pages.show', $page->id)}}" class="btn btn-info btn-sm" title="Detail"><i class="fa fa-search"></i></a>
                <a href="{{route('pages.edit', $page->id)}}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
              </td>
          </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>




@endsection
