@extends('admin.main')

@section('title', 'Artikel Diterbitkan')

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
      Telah disetujui
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
              <th>Diterbitkan oleh</th>
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
              <td><a href="">{{$article->users->name}}</a></td>
              <td width="13%" class="text-center">
                <button type="button" class="btn btn-info btn-sm" title="Detail" data-toggle="modal" data-target="#showModal"><i class="fa fa-search"></i></button>
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

  <div class="modal fade bd-example-modal-lg" id="showModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{$article->title}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="text-center">
            <img src="{{ asset('users/images/articles/' . $article->image) }}" class="img-responsive img-thumbnail">
          </div>
          <p>{!! $article->body !!}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i>Tutup</button>
          <input type="hidden" name="_token" value="{{ Session::token() }}">
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>



@endsection
