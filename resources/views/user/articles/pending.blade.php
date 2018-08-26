@extends('user.main')
@section('title', '| Artikel Pending')
@section('content')
      <header class="page-header">
        <div class="container-fluid">
          <h2 class="no-margin-bottom">Artikel Pending</h2>
        </div>
      </header>
      <section class="tables">
  <div class="container-fluid">
    <div class="row">


      <div class="col-lg-12">

      <a href="{{route('article.create')}}" class="btn btn-primary" style="margin-bottom: 10px">Artikel Baru</a>
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h3 class="h4">Artikel Pending</h3>
                </div>
                <div class="card-body table-responsive">
                  <table width="100%" class="table table-striped table-bordered" >
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Status</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Isi</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>

                    @foreach($articles as $article)
                    <tr class="odd gradeX">
                        <td>{{ $article->id}}</td>
                        <td>
                          @if($article->acceptable==0)
                          <button class="btn btn-warning">PENDING</button>
                          @else
                          <button class="btn btn-info">DITERBITKAN</button>
                          @endif
                        </td>
                        <td>
                          <img src="{{ asset('users/images/articles/' . $article->image) }}" style="height: 70px; width: 70px">
                        </td>
                        <td>{{ substr($article->title, 0, 30) }}{{ strlen($article->title) > 30 ? "..." : "" }}</td>
                        <td>{!! substr($article->body, 0, 300) !!}{!! strlen($article->body) > 300 ? "..." : "" !!}</td>
                        <td class="text-center">
                          <a href="{{ route('article.show', $article->id) }}"><i class="fa fa-search"></i></a>
                          <a href="{{ route('article.edit', $article->id) }}"><i class="fa fa-pencil"></i></a>
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
