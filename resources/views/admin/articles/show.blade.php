@extends('user.main')


@section('title', '| Detail Artikel')
@section('content')
<!-- Page Content -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Detail Artikel</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                  <div class="col-lg-7">
                    <div class="panel panel-success">
                      <div class="panel-heading">
                        {{ $article->title }}
                      </div>
                      <div class="panel-body">
                        <table class="table table-responsive">
                          <tbody>
                            <tr>
                              <th>Judul</th>
                              <td>{{$article->title}}</td>
                            </tr>
                            <tr>
                              <th>Gambar</th>
                              <td>
                                <img src="{{ asset('users/images/articles/' . $article->image) }}" class="img-responsive">
                              </td>
                            </tr>
                            <tr>
                              <th>Caption Gambar</th>
                              <td>
                                {{$article->caption}}
                              </td>
                            </tr>
                            <tr>
                              <th>Isi</th>
                              <td>
                                {!! $article->body !!}
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-5">
                    <div class="panel panel-yellow">
                      <div class="panel-heading">
                        Aksi
                      </div>
                      <div class="panel-body">
                        <table class="table">
                          <tbody>
                            <tr>
                              <th>Status</th>
                              <td>
                                @if($article->acceptable==0)
                                <button class="btn btn-warning btn-disable">PENDING</button>
                                @else
                                <button class="btn btn-info">DITERBITKAN</button>
                                @endif
                              </td>
                            </tr>
                            @if($article->acceptable==1)
                            <tr>
                              <th>URL Artikel</th>
                              <td><a href="{{ url('article/'.$article->slug)}}">{{url('article/'.$article->slug)}}</a></td>
                            </tr>
                            @endif
                            <tr>
                              <th>Tgl Diterbitkan:</th>
                              <td>{{ date('M j, Y', strtotime($article->updated_at)) }}</td>
                            </tr>
                          </tbody>
                        </table>
                        <a href="{{route('article.edit', $article->id)}}" class="btn btn-primary btn-block">Edit</a>
                        <hr>
                        <form action="{{route('article.destroy', $article->id)}}" method="POST">
                          <input type="submit" value="Hapus" class="btn btn-danger btn-block" data-toggle="confirmation">
                          <input type="hidden" name="_token" value="{{Session::token()}}">
                          {{method_field('DELETE')}}
                        </form>

                        <script type="text/javascript">
                        $(document).ready(function () {
                          $('[data-toggle=confirmation]').confirmation({
                              rootSelector: '[data-toggle=confirmation]',
                              onConfirm: function (event, element) {
                                  element.closest('form').submit();
                              }
                          });
                        });
                        </script>
                        <hr>
                        <a href="{{route('article.index')}}" class="btn btn-default btn-block"><< Kembali</a>
                      </div>
                    </div>
                  </div>
                </div>


@endsection
