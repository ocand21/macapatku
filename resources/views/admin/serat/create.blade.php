@extends('admin.main')

@section('title', 'Buat Serat Baru')


@section('content')

<!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Buat Serat Baru</li>
  </ol>

  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-pencil"></i>
      Buat Serat Baru
    </div>
    <div class="card-body">
      <form action="{{route('serat.store')}}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <div class="text-center">
          <label for="image">Foto</label>
          <input type="file" name="image" id="page-image" onchange="preview_image(event)">
          <div class="text-center">
            <img src="" id="output_image" class="img-thumbnail" width="400px" style="margin-bottom: 7px;">
            <p class="hint-text"><b style="color: red;">*</b>Opsional</p>
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
        <div class="form-group">
          <label for="">Judul</label>
          <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="">Pengarang</label>
          <input type="text" name="creator" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="">Isi Serat</label>
          <textarea class="form-control" rows="10" name="body"></textarea>
        </div>
        <div class="text-right">
          <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>Simpan</button>
          <a href="{{route('serat.index')}}" class="btn btn-danger"><i class="fa fa-close" aria-hidden="true"></i>Batal</a>

        </div>
      </form>



    </div>
  </div>




@endsection
