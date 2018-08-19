@extends('user.main')


@section('title', '| Edit Artikel')
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
                        Form Edit Artikel
                      </div>
                      <div class="panel-body">
                        <div class="row">
                          <div class="col-lg-12">
                            <form action="{{route('article.update', $article->id )}}" method="POST" role="form" enctype="multipart/form-data">
                              {{csrf_field()}}
                              <div class="form-group">
                                <label for="">Foto & Caption</label>
                                <input type="file" name="image" id="article-image" onchange="preview_image(event)">
                                <img src="{{ asset('users/images/articles/' . $article->image) }}" id="output_image" width="400px" style="margin-bottom: 7px;">
                                <script type="text/javascript">
                                  function preview_image(event)
                                  {
                                   var reader = new FileReader();
                                   reader.onload = function()
                                   {
                                    var output = document.getElementById('output_image');
                                    output.src = reader.result;
                                   }
                                   reader.readAsDataURL(event.target.files[0]);
                                  }
                                </script>
                                <input type="text" name="caption" class="form-control" placeholder="Caption Gambar" value="{{$article->caption}}">
                              </div>
                              <div class="form-group">
                                <label for="">Judul</label>
                                <input type="text" name="title" class="form-control" value="{{$article->title}}" required>
                              </div>
                              <div class="form-group">
                                <label for="">Isi Artikel</label>
                                <textarea class="form-control" rows="10" name="body">{!! $article->body !!}</textarea>
                                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                              </div>
                              <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary">Perbarui</button>
                                <input type="hidden" name="_token" value="{{ Session::token() }}"> {{ method_field('PUT') }}
                                <button type="submit" class="btn btn-info">Draft</button>
                                <a href="{{route('article.index')}}" class="btn btn-danger">Kembali</a>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
@endsection
