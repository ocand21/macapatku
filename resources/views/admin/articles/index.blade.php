@extends('user.main')


@section('title', '| Daftar Artikel')
@section('content')
<!-- Page Content -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Artikel Baru</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                  <div class="col-lg-12">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        Daftar Artikel
                      </div>
                      <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
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
                                <img src="{{ asset('users/images/articles/' . $article->image) }}" class="img-responsive">
                              </td>
                              <td>{{ substr($article->title, 0, 30) }}{{ strlen($article->title) > 30 ? "..." : "" }}</td>
                              <td>{!! substr($article->body, 0, 300) !!}{!! strlen($article->body) > 300 ? "..." : "" !!}</td>
                              <td class="text-center">
                                <a href="{{ route('article.show', Hashids::encode($article->id)) }}"><i class="fa fa-search"></i></a>
                                <a href="{{ route('article.edit', Hashids::encode($article->id)) }}"><i class="fa fa-pencil"></i></a>
                              </td>
                          </tr>
                          @endforeach

                          </tbody>
                        </table>
                      </div>

                    </div>
                  </div>
                </div>
@endsection
