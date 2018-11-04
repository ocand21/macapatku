@extends('user.main')
@section('title', "Edit $article->title")
@section('content')
    <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch grid-margin">
                    <div class="row flex-grow">
                      <div class="col-12">
                        <div class="card">
                          <div class="card-body">
                          <h4 class="card-title">Edit Artikel {{$article->title}}</h4>
                            <p class="card-description">
                              Form Edit Artikel
                            </p>
                            <form class="form-sample" action="{{route('article.update', $article->id )}}" method="POST" role="form" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                      <label for="" class="col-sm-3 col-form-label">Foto & Caption</label>
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
                                      <label for="" class="col-sm-3 col-form-label">Judul</label>
                                      <input type="text" name="title" class="form-control" value="{{$article->title}}" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="" class="col-sm-3 col-form-label">Isi Artikel</label>
                                      <textarea class="form-control" rows="10" name="body">{!! $article->body !!}</textarea>
                                      <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                                    </div>
                                    <div class="form-group text-right">
                                      <button type="submit" class="btn btn-primary">Perbarui</button>
                                      <input type="hidden" name="_token" value="{{ Session::token() }}"> {{ method_field('PUT') }}
                                      <button type="submit" class="btn btn-info">Draft</button>
                                      <a href="{{ route('article.index')}}" class="btn btn-danger">Batal</a>
                                    </div>
                                  </form>
                            
                          </div>
                        </div>
                      </div>
                      
                    </div>
                  </div>
    </div>
@endsection
@section('js')
<script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>

    <script src="/users/tinymce/tinymce.min.js"></script>

    <script>
      tinymce.init({
        selector: 'textarea',
        plugins: 'image'
      });
    </script>
@endsection