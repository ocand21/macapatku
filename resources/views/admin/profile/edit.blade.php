@extends('admin.main')

@section('title', 'Profil Saya')

@section('content')

<!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Profil Saya</li>
  </ol>

  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-admin"></i>
      Profil Saya
    </div>
    <div class="card-body">
      <div class="text-center">
        <img src="/users/images/avatar.png" alt="" width="200px" height="200px">
        <br>
        <button class="btn btn-info" type="button" data-toggle="modal" data-target="#pictureModal"><i class="fa fa-pencil"></i>Ubah Foto</button>
      </div>
      <form action="{{url('/admin/myprofile/edit')}}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="name">Nama Lengkap</label>
          <input type="text" name="name" class="form-control" value="{{Auth::guard('admin')->user()->name}}">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" class="form-control" value="{{Auth::guard('admin')->user()->email}}">
        </div>
        <div class="form-group">
          <label for="phone">Telepon</label>
          <input type="text" name="phone" class="form-control" value="{{Auth::guard('admin')->user()->phone}}">
        </div>
        <div class="text-right">
          <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>Simpan</button>
          <a href="{{route('admin.profile')}}" class="btn btn-danger"><i class="fa fa-close" aria-hidden="true"></i>Batal</a>
        </div>
      </form>
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
          <form action="{{route('admin.changePicture')}}" method="POST" enctype="multipart/form-data">

            <div class="form-group">
              <label for="picture">Foto</label>
              <input type="file" name="picture" id="admin-picture" onchange="preview_image(event)">
              <div class="text-center">
                <img src="{{ asset('users/images/avatar/' . Auth::guard('admin')->user()->picture) }}" id="output_image" class="img-thumbnail" width="400px" style="margin-bottom: 7px;">
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
  </div>
  </section>


@endsection
