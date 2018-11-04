@extends('user.main')
@section('title', 'Unggah Dokumen')
@section('content')
    <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch grid-margin">
                    <div class="row flex-grow">
                      <div class="col-12">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Unggah Dokumen</h4>
                            <p class="card-description">
                              Form Unggah Dokumen
                            </p>
                            <form class="form-sample" action="{{route('file.upload')}}" method="POST" role="form" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                  <label for="" class="col-sm-3 col-form-label">Judul</label>
                                  <input type="text" name="title" class="form-control" required>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-sm-3 col-form-label">Berkas</label>
                                  <input type="file" name="file" id="article-image">
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