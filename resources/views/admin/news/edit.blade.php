@extends('admin.main')

@section('title', 'Edit Berita')

@section('content')

<!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Edit Berita</li>
  </ol>

  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-pencil"></i>
      Edit Berita {{$news->title}}
    </div>
    <div class="card-body">
      <form action="{{route('news.update', $news->id)}}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <div class="text-center">
          <label for="image">Ganti Foto</label>
          <input type="file" name="image" id="news-image" onchange="preview_image(event)">
          <div class="text-center">
            <img src="{{ asset('admin/images/news/' . $news->image) }}" id="output_image" class="img-thumbnail" width="400px" style="margin-bottom: 7px;">
            <p class="hint-text">Preview Foto</p>

            <input type="text" name="caption" class="form-control" placeholder="Caption Gambar" value="{{$news->caption}}">
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
          <input type="text" name="title" class="form-control" value="{{$news->title}}" required>
        </div>
        <div class="form-group">
          <label for="">Isi Berita</label>
          <textarea class="form-control" rows="10" name="body">{{ $news->body }}</textarea>
        </div>
        <div class="text-right">
          <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>Simpan</button>
          <input type="hidden" name="_token" value="{{ Session::token() }}"> {{ method_field('PUT') }}
          <a href="{{route('news.show', $news->id)}}" class="btn btn-danger"><i class="fa fa-close" aria-hidden="true"></i>Batal</a>

        </div>
      </form>



    </div>
  </div>




@endsection
