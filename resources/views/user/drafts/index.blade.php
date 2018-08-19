@extends('user.main')
@section('title', '| Dashboard Pengguna')
@section('content')
      <header class="page-header">
        <div class="container-fluid">
          <h2 class="no-margin-bottom">Artikel</h2>
        </div>
      </header>
      <section class="tables">
  <div class="container-fluid">
    <div class="row">


      <div class="col-lg-12">

      <a href="{{route('article.create')}}" class="btn btn-primary" style="margin-bottom: 10px">Artikel Baru</a>
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h3 class="h4">Artikel</h3>
                </div>
                <div class="card-body table-responsive">
                  <table width="100%" class="table table-striped  table-bordered" >
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
                    @foreach($drafts as $draft)
                    <tr class="odd gradeX">
                        <td>{{ $draft->id}}</td>
                        <td>
                          <img src="{{ asset('users/images/articles/' . $draft->image) }}" class="img-responsive" style="height: 70px; width: 70px;">
                        </td>
                        <td>{{ substr($draft->title, 0, 30) }}{{ strlen($draft->title) > 30 ? "..." : "" }}</td>
                        <td>{!! substr($draft->body, 0, 300) !!}{!! strlen($draft->body) > 300 ? "..." : "" !!}</td>
                        <td class="text-center">
                          <a href="{{ route('draft.publish', Hashids::encode($draft->id)) }}"><i class="fa fa-pencil"></i></a>
                          <a href="{{ route('draft.destroy', $draft->id) }}"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

      </section>
@endsection
