@extends('admin.main')

@section('title', 'Ganti Password')

@section('content')

<!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Ganti Password</li>
  </ol>

  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-admin"></i>
      Ganti Password
    </div>
    <div class="card-body">
      <div class="alert alert-info">
								Silakan masukkan password lama dan password baru
			</div>
      <form action="{{url('/admin/password/change')}}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="">Password Lama</label>
          <input type="password" name="current_password" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Password Baru</label>
          <input type="password" name="new_password" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Konfirmasi Password Baru</label>
          <input type="password" name="new_password_confirmation" class="form-control">
        </div>
        <div class="text-right">
          <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>Simpan</button>
          <a href="{{route('admin.profile')}}" class="btn btn-danger"><i class="fa fa-close" aria-hidden="true"></i>Batal</a>
        </div>
      </form>
    </div>
  </div>

  </section>


@endsection
