@extends('user.main')
@section('title', '| Upload Berkas Baru')
@section('content')
      <header class="page-header">
        <div class="container-fluid">
          <h2 class="no-margin-bottom">Berkas</h2>
        </div>
      </header>
      <section class="tables">
  <div class="container-fluid">
    <div class="row">


      <div class="col-lg-12">

      <a href="{{route('file.index')}}" class="btn btn-primary" style="margin-bottom: 10px"><< Kembali</a>
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h3 class="h4">Berkas Baru</h3>
                </div>
                <div class="card-body">
                  <form action="{{route('file.upload')}}" method="POST" role="form" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                      <label for="">Judul</label>
                      <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="">Berkas</label>
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

      </section>
@endsection
