@extends('user.main')


@section('title', '| Daftar Draft')
@section('content')
<!-- Page Content -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Draft</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                  <div class="col-lg-12">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        Draft
                      </div>
                      <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
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
                                <img src="{{ asset('users/images/articles/' . $draft->image) }}" class="img-responsive">
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
@endsection
