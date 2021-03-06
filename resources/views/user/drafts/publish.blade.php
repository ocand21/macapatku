@extends('user.main')
@section('title', "Terbitkan $draft->title")
@section('content')
    <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch grid-margin">
                    <div class="row flex-grow">
                      <div class="col-12">
                        <div class="card">
                          <div class="card-body">
                          <h4 class="card-title">Terbitkan Draft {{$draft->title}}</h4>
                            <p class="card-description">
                              Form Edit Artikel
                            </p>
                            <form action="{{route('article.store')}}" method="POST" role="form" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                  <label for="">Foto & Caption</label>
                                  <input type="file" name="image" id="article-image" onchange="preview_image(event)">
                                  <img src="" id="output_image" width="400px" style="margin-bottom: 7px;">
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
                                  <input type="text" name="caption" class="form-control" placeholder="Caption Gambar">
                                </div>
                                <div class="form-group">
                                  <label for="">Judul</label>
                                  <input type="text" name="title" class="form-control" required>
                                </div>
                                <div class="form-group">
                                  <label for="">Isi Artikel</label>
                                  <textarea class="form-control" rows="10" name="body"></textarea>
                                  <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                                </div>
                                <div class="form-group text-right">
                                  <button type="submit" class="btn btn-primary" name="publish">Terbitkan</button>
                                  <button type="submit" name="draft" class="btn btn-info" value="1">Draft</button>
                                  <input type="hidden" name="_token" value="{{ Session::token() }}">
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