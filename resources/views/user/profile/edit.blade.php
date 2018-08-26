@extends('user.main')
@section('title', '| Edit Profil')
@section('content')
      <header class="page-header">
        <div class="container-fluid">
          <h2 class="no-margin-bottom">Edit Profil</h2>
        </div>
      </header>
      <section class="tables">
  <div class="container-fluid">
    <div class="row">


      <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h3 class="h4">Edit Profil</h3>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img src="/users/images/avatar.png" alt="" width="200px" height="200px">
                    <br>
                    <button class="btn btn-info" type="button" data-toggle="modal" data-target="#pictureModal"><i class="fa fa-pencil"></i>Ubah Foto</button>
                  </div>
                  <form action="{{url('/user/myprofile/edit')}}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{Auth::user()->id}}">
                    <div class="form-group">
                      <label for="name">Nama Lengkap</label>
                      <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}">
                    </div>
                    <div class="form-group">
                      <label for="phone">Telepon</label>
                      <input type="text" name="phone" class="form-control" value="{{Auth::user()->phone}}">
                    </div>
                    <div class="form-group">
                      <label for="address">Alamat</label>
                      <input type="text" name="address" class="form-control" value="{{Auth::user()->address}}">
                    </div>
                    <div class="form-group">
                      <label for="aboutme">Tentang Saya</label>
                      <textarea name="aboutme" rows="8" cols="80">{{Auth::user()->aboutme}}</textarea>
                    </div>
                    <div class="text-right">
                      <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>Simpan</button>
                      <a href="{{route('myprofile')}}" class="btn btn-danger"><i class="fa fa-close" aria-hidden="true"></i>Batal</a>

                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade bd-example-modal-lg" id="pictureModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{route('changePicture')}}" method="POST" enctype="multipart/form-data">

                  <div class="form-group">
                    <label for="picture">Foto</label>
                    <input type="file" name="picture" id="user-picture" onchange="preview_image(event)">
                    <div class="text-center">
                      <img src="{{ asset('users/images/avatar/' . Auth::user()->picture) }}" id="output_image" class="img-thumbnail" width="400px" style="margin-bottom: 7px;">
                      <p class="hint-text">Preview Foto</p>
                    </div>
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
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i>Batal</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i>Simpan</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection
