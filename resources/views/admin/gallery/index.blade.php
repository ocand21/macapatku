@extends('admin.main')



@section('title', 'Galeri')
@section('css')
  <link rel="stylesheet" href="/admin/fancybox/jquery.fancybox.min.css">
@endsection

@section('content')

<!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Galeri Website</li>
  </ol>

  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-admin"></i>
      Galeri
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table width="100%" class="table table-striped table-bordered" >
          <thead>
            <tr>
              <th>#</th>
              <th>Foto</th>
              <th>Deskripsi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>

          @foreach($galleries as $gallery)
          <tr class="odd gradeX">
              <td>{{ $gallery->id}}</td>

              <td>
                <a href="{{ asset('admin/images/gallery/' . $gallery->filename) }}" data-fancybox="group" data-caption="{{$gallery->description}}">
                  <img src="{{ asset('admin/images/gallery/' . $gallery->resized_name) }}" alt="">
                </a>
              </td>
              <td>
                @if($gallery->description)
                  <p>{{$gallery->description}}</p>
                @else
                <form action="{{route('gallery.desc', $gallery->id)}}" method="POST">
                  {{csrf_field()}}
                  <input type="text" name="description" value="" class="form-control" placeholder="Masukkan deskripsi foto">
                  <p class="hint">Tekan Enter untuk menyimpan</p>
                </form>
                @endif
              </td>
              <td width="13%" class="text-center">
                <a href="{{route('gallery.destroy', $gallery->id )}}" class="btn btn-danger btn-sm" title="Hapus" onclick="event.preventDefault();
                                             document.getElementById('delete-form').submit();"><i class="fa fa-close"></i></a>
                <form action="{{route('gallery.destroy', $gallery->id)}}" id="delete-form" method="post" style="display: none;">
                  {{csrf_field()}}
                  {{method_field('DELETE')}}
                </form>
              </td>
          </tr>
          @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>




@endsection
@section('js')
  <script src="/admin/fancybox/jquery.fancybox.min.js"></script>
@endsection
