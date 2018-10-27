@extends('admin.main')

@section('title', 'Edit Halaman')

@section('content')

<!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Edit Halaman</li>
  </ol>

  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-pencil"></i>
      Edit Halaman {{$page->title}}
    </div>
    <div class="card-body">
      <form action="{{route('pages.update', $page->id)}}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <div class="text-center">
          <label for="image">Ganti Foto</label>
          <input type="file" name="image" id="page-image" onchange="preview_image(event)">
          <div class="text-center">
            <img src="{{ asset('admin/images/pages/' . $page->image) }}" id="output_image" class="img-thumbnail" width="400px" style="margin-bottom: 7px;">
            <p class="hint-text">Preview Foto</p>

            <input type="text" name="caption" class="form-control" placeholder="Caption Gambar" value="{{$page->caption}}">
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
          <labl for="">Judul</label>
          <input type="text" name="title" class="form-control" value="{{$page->title}}" required>
        </div>
        <div class="form-group">
          <label for="">Isi Halaman</label>
          <textarea class="form-control" rows="10" name="body">{{ $page->body }}</textarea>
        </div>
        <div class="text-right">
          <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>Simpan</button>
          <input type="hidden" name="_token" value="{{ Session::token() }}"> {{ method_field('PUT') }}
          <a href="{{route('pages.show', $page->id)}}" class="btn btn-danger"><i class="fa fa-close" aria-hidden="true"></i>Batal</a>

        </div>
      </form>



    </div>
  </div>




@endsection
