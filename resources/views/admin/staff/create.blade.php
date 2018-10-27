@extends('admin.main')

@section('title', 'Registrasi Staf Baru')

@section('content')

<!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Registrasi Staf Baru</li>
  </ol>

  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-pencil"></i>
      Registrasi Staf Baru
    </div>
    <div class="card-body">
      <form action="{{route('staff.register')}}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <labl for="">Nama</label>
          <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
          <labl for="">Email</label>
          <input type="text" name="email" class="form-control" required>
        </div>
        <div class="form-group">
          <labl for="">No. Telp/ HP</label>
          <input type="text" name="phone" class="form-control" required>
        </div>
        <div class="form-group">
          <labl for="">Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
          <labl for="">Konfirmasi Password</label>
          <input type="password" name="password_confirmation" class="form-control" required>
        </div>
        <div class="text-right">
          <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>Simpan</button>
          <a href="{{route('news.index')}}" class="btn btn-danger"><i class="fa fa-close" aria-hidden="true"></i>Batal</a>

        </div>
      </form>



    </div>
  </div>




@endsection
