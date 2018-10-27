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
      <div class="text-right" style="margin-bottom: 10px">
        <a href="{{route('admin.profile.edit')}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
        <a href="{{route('admin.change.password')}}" class="btn btn-danger"><i class="fa fa-cog" aria-hidden="true"></i>Ganti Password</a>
      </div>
      <div class="table-responsive">
        <table class="table" width="100%" cellspacing="0">
          <tbody>
            <tr>
              <th>Foto</th>
              <td>
                <div class="text-center">
                  <img src="{{ asset('admin/images/avatar/' . Auth::guard('admin')->user()->picture) }}" class="img-responsive img-thumbnail" alt="">
                </div>
              </td>
            </tr>
            <tr>
              <th>Nama</th>
              <td>{{Auth::guard('admin')->user()->name}}</td>
            </tr>
            <tr>
              <th>Email</th>
              <td>{{Auth::guard('admin')->user()->email}}</td>
            </tr>
            <tr>
              <th>Telepon</th>
              <td>{{Auth::guard('admin')->user()->phone}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>




@endsection
