@extends('admin.main')

@section('title', 'Artikel Pending')

@section('content')

<!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Artikel Pengguna</li>
  </ol>

  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-admin"></i>
      Butuh Persetujuan
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table width="100%" class="table table-striped table-bordered" >
          <thead>
            <tr>
              <th>#</th>
              <th>Gambar</th>
              <th>Judul</th>
              <th>Isi</th>
              <th>Diposting Oleh</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>

          @foreach($articles as $article)
          <tr class="odd gradeX">
              <td>{{ $article->id}}</td>

              <td>
                <img src="{{ asset('users/images/articles/' . $article->image) }}" style="height: 70px; width: 70px">
              </td>
              <td>{{ substr($article->title, 0, 30) }}{{ strlen($article->title) > 30 ? "..." : "" }}</td>
              <td>{!! substr($article->body, 0, 300) !!}{!! strlen($article->body) > 300 ? "..." : "" !!}</td>
              <td><a href="#">{{$article->users->name}}</a></td>
              <td width="13%" class="text-center">
                <a href="{{ route('article.edit', $article->id) }}" class="btn btn-info btn-sm" title="Detail"><i class="fa fa-search"></i></a>
                <a href="{{route('admin.publish.article', $article->id)}}" class="btn btn-success btn-sm" title="Terbitkan" onclick="event.preventDefault();
                                             document.getElementById('publish-form').submit();"><i class="fa fa-check"></i></a>
                <form action="{{route('admin.publish.article', $article->id)}}" method="POST" id="publish-form" style="display: none;">
                  {{csrf_field()}}
                  <input type="text" name="acceptable" value="1">
                </form>
                <a href="{{route('admin.decline.article', $article->id )}}" class="btn btn-danger btn-sm" title="Tolak" onclick="event.preventDefault();
                                             document.getElementById('decline-form').submit();"><i class="fa fa-close"></i></a>
                <form action="{{route('admin.decline.article', $article->id)}}" id="decline-form" method="post" style="display: none;">
                  {{csrf_field()}}
                  {{method_field('DELETE')}}
                </form>
              </td>
          </tr>
          @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>




@endsection
